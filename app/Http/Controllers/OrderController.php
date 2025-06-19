<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Products;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ProductOrderedNotification;
use App\Notifications\ProductOutOfStockNotification;
use App\Notifications\OrderStatusNotification;

class OrderController extends Controller
{
    /**
     * User: View their own orders
     */
    public function index()
    {
        $orders = Order::with('product')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('user.viewOrder', compact('orders'));
    }

    /**
     * Admin: View all orders
     */
    public function adminViewOrders()
    {
        $orders = Order::with(['product', 'user'])->latest()->get();
        return view('admin.viewOrders', compact('orders'));
    }

    /**
     * Place new order
     */
    public function placeOrder(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Products::findOrFail($request->product_id);

        if ($product->quantity < $request->quantity) {
            return back()->with('error', 'Not enough stock available.');
        }

        // Deduct product quantity
        $product->quantity -= $request->quantity;
        $product->save();

        // Calculate total price
        $totalPrice = $product->price * $request->quantity;

        // Create the order
        $order = Order::create([
            'user_id'     => Auth::id(),
            'product_id'  => $product->id,
            'quantity'    => $request->quantity,
            'total_price' => $totalPrice,
            'status'      => 'pending',
        ]);

        // 🔔 Notify all admins
        $admins = User::where('role', 'admin')->get();
        Notification::send($admins, new ProductOrderedNotification(Auth::user(), $product, $request->quantity, $order));

        // 🚨 Notify out-of-stock
        if ($product->quantity === 0) {
            Notification::send($admins, new ProductOutOfStockNotification($product));
        }

        return back()->with('success', 'Your order has been placed!');
    }

    /**
     * Admin: Accept or decline order + notify user
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:accepted,declined']);

        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        // 🔔 Notify user of update
        $order->user->notify(new OrderStatusNotification($order));

        return back()->with('success', 'Order status updated.');
    }
}

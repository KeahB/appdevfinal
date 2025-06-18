<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with('product')->where('user_id', Auth::id())->get();
        return view('user.orders', compact('orders'));
    }
}
return redirect()->back()->with('success', 'Order placed successfully! Product: '.$product->name.', Qty: '.$quantity.', Total: ₱'.$total);

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Display a list of users
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Show a specific user's profile
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    // Edit user form
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update user info
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $user->update($request->all());

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

   public function orderPage()
{
    $products = Products::all();
    return view('user.order', compact('products'));
}

public function placeOrder(Request $request)
{
    $request->validate([
        'product_id' => 'required|exists:products,id',
        'quantity' => 'required|integer|min:1',
    ]);

    Order::create([
        'user_id' => Auth::id(),
        'product_id' => $request->product_id,
        'quantity' => $request->quantity,
    ]);

    return back()->with('success', 'Order placed successfully!');
}
    public function productList()
    {
    return view('user.products');   
    }

    // Delete a user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}

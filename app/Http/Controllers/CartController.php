<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request, $id)
{
    $menu = Menu::findOrFail($id);

    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'title' => $menu->title,
            'harga' => $menu->harga,
            'quantity' => 1,
            'photo' => $menu->photo, 
            'body' => $menu->body,  
        ];
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Item added to cart!');
}


public function remove(Request $request, $id)
{
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']--;
        if ($cart[$id]['quantity'] <= 0) {
            unset($cart[$id]);
        }
    }

    session()->put('cart', $cart);

    return redirect()->back()->with('success', 'Item removed from cart!');
}

public function checkout(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Your cart is empty!');
    }

    $subtotal = 0;
    foreach ($cart as $details) {
        $subtotal += $details['harga'] * $details['quantity'];
    }
    $tax = 3000; 
    $total = $subtotal + $tax;

    $order = Order::create([
        'user_id' => auth()->id(),
        'subtotal' => $subtotal,
        'tax' => $tax,
        'total' => $total,
    ]);

    foreach ($cart as $menuId => $details) {
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id' => $menuId,
            'quantity' => $details['quantity'],
            'price' => $details['harga'],
        ]);
    }

    session()->forget('cart');

    return redirect()->route('invoices')->with('success', 'Order telah diadd!');

}

public function invoices()
{
    $orders = Order::where('user_id', auth()->id())->with('orderItems.menu')->get();
    return view('invoices', compact('orders'));
}


}

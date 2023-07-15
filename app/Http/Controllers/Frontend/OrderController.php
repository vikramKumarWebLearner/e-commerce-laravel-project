<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->paginate(10);

        return view('frotend.orders.index', compact('orders'));
    }

    public function show($orderId)
    {
        $order = Order::where('user_id', auth()->user()->id)->where('id', $orderId)->first();

        if ($order) {
            return view('frotend.orders.show', compact('order'));
        } else {
            return redirect()->back()->with('message', 'No Order Found');
        }
    }
}

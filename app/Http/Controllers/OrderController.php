<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->get();

        return view('orders.index', [
            'orders' => $orders,
            'statuses' => Order::STATUSES

        ]);
    }

    public function setStatus(Request $request, Order $order)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->back();
    }

    public function showMyOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();

        return view('orders.my-orders', [
            'orders' => $orders,
            'statuses' => Order::STATUSES

        ]);
    }

    public function add(Request $request)
    {
        $order = new Order;
        $order->dish_id = $request->dish_id;
        $order->user_id = Auth::user()->id;
        $order->count = $request->count;
        $order->status = 1;
        $order->save();

        return redirect()->back();
        // return redirect()->route('my-orders');
    }
}

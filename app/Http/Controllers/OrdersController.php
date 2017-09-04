<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order as Order;

class OrdersController extends Controller
{
    public function create()
    {
        return view('pages.ordersNew');
    }

    public function show()
    {
        $orders = Order::all();
        return view('pages.ordersIndex', ['orders' => $orders]);
    }
}

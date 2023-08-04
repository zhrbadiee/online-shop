<?php

namespace App\Http\Controllers\app\profile;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function index()
    {
        if(isset(request()->type))
        {
            $orders = auth()->user()->orders()->where('order_status', request()->type)->orderBy('id', 'desc')->get();

        }
        else{
            $orders = auth()->user()->orders()->orderBy('id', 'desc')->get();
        }
        return view('app.profile.orders', compact('orders'));
    }
    public function detail(Order $order)
    {
        return view('app.profile.detail_order', compact('order'));
    }
}

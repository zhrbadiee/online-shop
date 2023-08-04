<?php

namespace App\Http\Controllers\admin\order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function newOrders()
    {
        $values=[0,1];
        $orders = Order::wherein('order_status',$values)->get();
        // foreach ($orders as $order) {
        //     $order->order_status = 1;
        //     $result = $order->save();
        // }
        return view('admin.order.index', compact('orders'));
    }
    public function sending()
    {
        $orders = Order::where('delivery_status', 1)->get();
        return view('admin.order.index', compact('orders'));
    }
    public function canceled()
    {
        $orders = Order::where('order_status', 4)->get();
        return view('admin.order.index', compact('orders'));
    }
    public function all()
    {
        $orders = Order::all();
        return view('admin.order.index', compact('orders'));
    }
    public function show(Order $order)
    {
        return view('admin.order.show', compact('order'));
    }
    public function detail(Order $order)
    {
        return view('admin.order.detail', compact('order'));
    }
    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default:
                $order->delivery_status = 0;
        }
        $order->save();
        return back();
    }
    public function changeOrderStatus(Order $order)
    {
        switch ($order->order_status) {
            case 0:
               $order->order_status = 1;
               break;
            case 1:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            default:
                $order->order_status = 0;
        }
        $order->save();
        return back();
    }
    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        return back();
    }
}

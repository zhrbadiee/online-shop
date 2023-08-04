<?php

namespace App\Http\Controllers\app\salesProcess;

use App\Models\Post;
use App\Models\Order;
use App\Models\Payment;
use App\Models\CartItem;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PaymentAppController extends Controller
{
    public function payment()
    {
        $user = auth()->user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        return view('app.salesProcess.payment', compact('cartItems', 'order'));
    }

    public function paymentSubmit(Request $request)
    {
        $order = Order::where('user_id', Auth::user()->id)->where('order_status', 0)->first();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        $amount=$order->order_final_amount + $order->delivery_amount;
        $payment = Payment::create(
            [
                'amount' =>  $amount,
                'user_id' => auth()->user()->id,
                'pay_date' => now(),
                'status' => 1,
            ]
        );
        $payment_id=DB::table('payments')->where('user_id', Auth::user()->id)->latest()->value('id');
        $paymentt=Payment::find($payment_id);
        $payment_object='هزینه پرداخت'.$paymentt->amount. ' تاریخ پرداخت:'.$paymentt->pay_date;
        $order->update(
            ['order_status' => 1,'payment_id'=>$paymentt->id ,'payment_object'=> $payment_object,'payment_status'=>1]
        );

        foreach ($cartItems as $cartItem) {

            OrderItem::create([
                'order_id' => $order->id,
                'post_id' => $cartItem->post_id,
                'post' => $cartItem->post,
                'number' => $cartItem->number,
                'final_product_price' =>$cartItem->cartItemProductPrice(),
                'final_total_price' =>$cartItem->cartItemProductPrice() * ($cartItem->number)
            ]);
            $number=$cartItem->number;
            $post=Post::find($cartItem->post_id);
            $post->Update(['solid_number'=>$post->solid_number += $number]);
            $cartItem->delete();
        }
        
         return redirect()->route('app.index')->with('success', 'سفارش شما با موفقیت ثبت شد');

    }
}

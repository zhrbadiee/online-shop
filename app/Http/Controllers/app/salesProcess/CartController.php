<?php

namespace App\Http\Controllers\app\salesProcess;

use App\Http\Controllers\Controller;
use App\Models\CartItem;
use App\Models\Post;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function cart()
    {
        if (Auth::check())
        { 
            $cartItems=CartItem::where('user_id', auth()->user()->id)->get();
            return view('app.cart.show',compact('cartItems'));
        }
    }

    public function updateCart(Request $request)
    {
        $inputs = $request->all();
        $cartItems = CartItem::where('user_id', Auth::user()->id)->get();
        foreach($cartItems as $cartItem){
            if(isset($inputs['number'][$cartItem->id]))
            {
                $cartItem->update(['number' => $inputs['number'][$cartItem->id]]);
            }
        }
         return redirect()->route('sales-process.address-and-delivery');
    }

    public function addToCart(Post $post, Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'number' => 'numeric|min:1|max:5'
            ]);
            $cartItems = CartItem::where('post_id', $post->id)->where('user_id', auth()->user()->id)->get();

            foreach ($cartItems as $cartItem) 
            {
                if($cartItem->number != $request->number)
                {
                    $cartItem->update(['number' => $request->number]);
                }
                return back();
            }

            $inputs = [];
            $inputs['user_id'] = auth()->user()->id;
            $inputs['post_id'] = $post->id;
            

            CartItem::create($inputs);
            
            return redirect()->back()->with(['success' => 'محصول مورد نظر با موفقیت در سبد خرید شما اضافه شد']);
        } else 
        {
            return redirect()->route('login');
        } 
    }

    public function removeFromCart(CartItem $cartItem)
    {
        if($cartItem->user_id === Auth::user()->id)
       {
        $cartItem->delete();
       }
       return back();
    }
}

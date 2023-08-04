<?php

namespace App\Http\Controllers\app\salesProcess;

use App\Models\Order;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use App\Http\Requests\ChooseAddressAndDeliveryRequest;

class AddressController extends Controller
{
    public function addressAndDelivery()
    {
        //check profile
        $user = Auth::user();
        $cartItems = CartItem::where('user_id', $user->id)->get();
        $deliveryMethods = Delivery::where('status', 1)->get();

        if(empty(CartItem::where('user_id', $user->id)->count()))
        {
            return redirect()->route('sales-process.cart');
        }

        return view('app.salesProcess.address-and-delivery', compact('cartItems', 'deliveryMethods'));
    }

    public function addAddress(StoreAddressRequest $request)
    {
        $inputs = $request->all();
        $inputs['user_id'] = auth()->user()->id;
        $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
        $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);
        $address = Address::create($inputs);
        return redirect()->back();
    }

    public function updateAddress(Address $address, UpdateAddressRequest $request)
    {
       $inputs = $request->all();
       $inputs['user_id'] = auth()->user()->id;
       $inputs['postal_code'] = convertArabicToEnglish($request->postal_code);
       $inputs['postal_code'] = convertPersianToEnglish($inputs['postal_code']);
       $address->update($inputs);
       return redirect()->back();
    }

    public function chooseAddressAndDelivery(ChooseAddressAndDeliveryRequest $request)
    {   
        $user = auth()->user(); 
        $inputs = $request->all();

        //calc price
         $cartItems = CartItem::where('user_id', $user->id)->get();
         $totalProductPrice = 0;
         $totalFinalPrice = 0;
         
        foreach ($cartItems as $cartItem)
        {
            $totalProductPrice += $cartItem->cartItemProductPrice();
            $totalFinalPrice += $cartItem->cartItemFinalPrice();
            $finalPrice = $totalFinalPrice;
        }
        $select_address_id=$request->address_id;
        $address_object=Address::find($select_address_id);
        $select_delivery_id=$request->delivery_id;
        $delivery_object=Delivery::find($select_delivery_id);
        $inputs['user_id'] = $user->id;
        $inputs['address_object'] = ' آدرس:'.$address_object->address .' کدپستی:'. $address_object->postal_code.' طبقه:'.$address_object->no.' واحد:'.$address_object->unit ;
        $inputs['delivery_object']=' شیوه ارسال:'.$delivery_object->name.' ' . $delivery_object->delivery_time . $delivery_object->delivery_time_unit.' کاری-';
        $inputs['delivery_amount']=$delivery_object->amount;
        $inputs['order_final_amount'] = $finalPrice;
        $order = Order::updateOrCreate(
            ['user_id' => $user->id, 'order_status' => 0 ],
            $inputs
        );
        return redirect()->route('sales-process.payment');
    }
}

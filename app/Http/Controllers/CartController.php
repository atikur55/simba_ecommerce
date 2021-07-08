<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Coupon;
use App\Cart;

class CartController extends Controller
{
    public function addtocart(Request $request){

    	if (Cart::where('ip_address',$request->ip())->where('product_id',$request->product_id)->exists()) 
    	{
    		Cart::where('ip_address',$request->ip())->where('product_id',$request->product_id)->increment('amount',$request->amount);
    	} else {
    		Cart::insert([
    		'ip_address' =>$request->ip(),
    		'product_id' =>$request->product_id,
    		'amount' =>$request->amount,
    		'created_at' => Carbon::now(),
    	]);
    	}  	
    	return back();
    }
    public function deletecart($cart_id)
    {
        Cart::find($cart_id)->delete();
        return back();
    }
    public function cart($coupon_name = '')
    {
        if ($coupon_name) {
            if (Coupon::where('coupon_name',$coupon_name)->first()) {
               if (Coupon::where('coupon_name',$coupon_name)->first()->validity_date >= Carbon::now()->format('Y-m-d')) {
                $discount_amounts = Coupon::where('coupon_name',$coupon_name)->first()->discount_amount;
                return view('frontend.cart',compact('discount_amounts'));
               } else {
                return back()->withErrors('Coupon Code Exists');
                }
            
             }
        else {
            return back()->withErrors('No Such Coupon Code');
        }
        } else {
            return view('frontend.cart');
        }
        
        
        
    }
    public function updatecart(Request $request)
    {
        foreach ($request->cart_id as $key => $id) {
            Cart::find($id)->update([
                'amount' => $request->cart_quantity[$key],
            ]);
        }
        return back();
    }
}

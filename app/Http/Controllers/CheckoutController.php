<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Country;
use App\City;
use App\Order;
use App\Order_list;
use Auth;
use Carbon\Carbon;

class CheckoutController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout(Request $request)
    {
    	$total = $request->total;
        $countries = Country::all();
    	return view('frontend.checkout',compact('total','countries'));
    }
    public function getcitylist(Request $request){
        $city_item = '';
       $cities = City::where('country_id',$request->country_id)->get();
       foreach ($cities as $city){
           $city_item .= "<option value = '".$city->id."'>".$city->city_name."</option>";
       }
       echo $city_item;
    }
    public function checkoutpost(Request $request)
    {
        if ($request->payment_method == 2) {
            
            $order_id = Order::insertGetId($request->except('_token') + [
                'user_id' => Auth::id(),
                'created_at' => Carbon::now(),
            ]);
            foreach (cart_products() as $cart_product) {
                Order_list::insert([
                    'user_id' => Auth::id(),
                    'order_id' => $order_id,
                    'product_id' => $cart_product->product_id,
                    'quantity' => $cart_product->amount,
                    'created_at' => Carbon::now(),
                ]);
                Product::find($cart_product->product_id)->decrement('quantity', $cart_product->amount);
                Cart::find($cart_product->id)->delete();
            }
        } 
        else {
            return view('frontend.onlinepayment',[

                'fname' => $request->fname,
                'email' => $request->email,
                'phone' => $request->phone,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'note' => $request->note,
                'subtotal' => $request->subtotal,
                'total' => $request->total,
                'payment_method' => $request->payment_method,
                

            ]);
        }
        
    }
}

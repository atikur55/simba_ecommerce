<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use App\Order;
use App\Order_list;
use App\Product;
use App\Cart;
use Auth;
use Carbon\Carbon;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe()
    {
        return view('stripe');
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $request->total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com." 
        ]);
        $order_id = Order::insertGetId([
                'user_id' => Auth::id(),
                'fname' => $request->fname,
                'email' => $request->email,
                'phone' => $request->phone,
                'country_id' => $request->country_id,
                'city_id' => $request->city_id,
                'address' => $request->address,
                'note' => $request->note,
                'subtotal' => $request->subtotal,
                'total' => $request->total,
                'payment_method' => 1,
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
  
        // Session::flash('success', 'Payment successful!');
          
        // return back();
    }
}

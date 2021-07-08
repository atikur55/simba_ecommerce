<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_list;
use Auth;
use Carbon\Carbon;
use PDF;

class CustomerController extends Controller
{
    public function customerhome(){
    	$customer_orders = Order::where('user_id',Auth::id())->get();
    	return view('customer.home',compact('customer_orders'));
    }
    public function orderdownload($order_id)
    {
    	$order_info = Order::findOrFail($order_id);
    	$order_pdf = PDF::loadView('customer.download.order', $order_info,compact('order_info'));
    	$dynamic_name = "order-".$order_info->id.'_'.Carbon::now()->format('d-m-Y').".pdf";
		return $order_pdf->download($dynamic_name);
    }
    public function sendsms($order_id)
    {
        $order_info = Order::findOrFail($order_id);
        $order_info->id;
        $order_info->total;
        $order_info->phone;

        $url = "http://66.45.237.70/api.php";
        $number=$order_info->phone;
        $text="Dear Customer , Your Order ID is : ".$order_info->id." . Your Payment Done : "."$".$order_info->total." .";
        $data= array(
        'username'=>"01631618174",
        'password'=>"YDZBXMF3",
        'number'=>"$number",
        'message'=>"$text"
        );

        $ch = curl_init(); // Initialize cURL
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $smsresult = curl_exec($ch);
        $p = explode("|",$smsresult);
        $sendstatus = $p[0];
        if($sendstatus == 1101)
        {
            echo "SMS Send Successfully";
        }
    }
    public function addreview(Request $request)
    {
        Order_list::where('user_id',Auth::id())->where('product_id',$request->product_id)->whereNull('review')->first()->update([
            'review' => $request->review,
            'star' => $request->star,
        ]);
        return back();
    }
}

<?php 

	function total_cart()
	{
		echo App\Cart::where('ip_address',request()->ip())->count();
	}
	function cart_products()
	{
		return App\Cart::where('ip_address',request()->ip())->get();
	}
	function cart_sub_total()
	{
		$total_sub = 0;
		foreach (cart_products() as  $cart_product) {
			$total_sub = $total_sub + ($cart_product->amount * App\Product::find($cart_product->product_id)->product_price);
		}
		return $total_sub;
	}
	function review_star_amount($product_id)
	{
		$total_star =  App\Order_list::where('product_id',$product_id)->whereNotNull('star')->sum('star');
		$total_review = App\Order_list::where('product_id',$product_id)->whereNotNull('review')->count('review');
		if ($total_review == 0) {
			return 0;
		} 
		else {
			$star_amount = $total_star/$total_review;
			return $star_amount;
		}
		
		
	}
	

 ?>
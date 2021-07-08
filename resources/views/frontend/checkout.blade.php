@extends('layouts.frontend')
@section('content')
 <!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Checkout</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Checkout</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- checkout-area start -->
    <div class="checkout-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="checkout-form form-style">
                        <h3>Billing Details</h3>
                    <form action="{{url('checkoutpost')}}" method="POST">
                        @csrf
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <p>Full Name *</p>
                                    <input type="text" name="fname" value="{{Auth::user()->name}}">
                                </div>
                              
                                <div class="col-sm-6 col-12">
                                    <p>Email Address *</p>
                                    <input type="email" name="email" value="{{Auth::user()->email}}">>
                                </div>
                                <div class="col-sm-12 col-12">
                                    <p>Phone No. *</p>
                                    <input type="text" name="phone">
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Country *</p>
                                    <select name="country_id" id="country_list">
                                    	<option value="">-- Select Country --</option>
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->country_name}}</option>
                                    	@endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 col-12">
                                    <p>Town/City *</p>
                                    <select name="city_id" id="city_list">
                                    	<option value="">-- Select City --</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <p>Your Address *</p>
                                    <input type="text" name="address">
                                </div>
                               
                                <div class="col-12">
                                    <p>Order Notes </p>
                                    <textarea name="note" placeholder="Notes about Your Order, e.g.Special Note for Delivery"></textarea>
                                </div>
                            </div>
                       
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="order-area">
                        <h3>Your Order</h3>
                        <ul class="total-cost">
                            @foreach(cart_products() as $cart_product)
                            <li>{{$cart_product->connect_to_product_table->product_name}} <span class="pull-right">${{$cart_product->connect_to_product_table->product_price}}</span></li>
                            @endforeach
                            <li>Subtotal <span class="pull-right"><strong>${{cart_sub_total()}}</strong></span>
                                
                            </li>
                            <input type="hidden" name="subtotal" value="{{cart_sub_total()}}">
                            <li>Shipping <span class="pull-right">Free</span></li>
                            <li>Total<span class="pull-right">${{$total}}</span>
                                <input type="hidden" name="total" value="{{$total}}">
                            </li>
                        </ul>
                        <ul class="payment-method">
                            <li>
                                <input id="card" type="radio" name="payment_method" value="1">
                                <label for="card">Credit Card</label>
                            </li>
                            <li>
                                <input id="delivery" type="radio" name="payment_method" value="2">
                                <label for="delivery">Cash on Delivery</label>
                            </li>
                        </ul>
                        <button type="submit">Place Order</button>
                         </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- checkout-area end -->
@endsection
@section('footer_script')
<script>
    $(document).ready(function(){
        $('#country_list').change(function(){
            var country_id = $(this).val();
            

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'GET',
                url: 'get/city/list',
                data:{country_id:country_id},
                success:function(data){
                    $('#city_list').html(data);
                }
            });


        });
    });
</script>
@endsection
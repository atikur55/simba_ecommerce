@extends('layouts.frontend')
@section('content')
<!-- .breadcumb-area start -->
    <div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Shopping Cart</h2>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .breadcumb-area end -->
    <!-- cart-area start -->
    <div class="cart-area ptb-100">
        <div class="container">
            @if($errors->all())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <strong>{{$error}}</strong>
                    @endforeach
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    
                        <table class="table-responsive cart-wrap">
                            <thead>
                                <tr>
                                    <th class="images">Image</th>
                                    <th class="product">Product</th>
                                    <th class="ptice">Price</th>
                                    <th class="quantity">Quantity</th>
                                    <th class="total">Total</th>
                                    <th class="remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                            	<form action="{{url('update/cart')}}" method="POST">
                            		@csrf
                            	@foreach(cart_products() as $cart)
                                <tr>
                                    <td class="images"><img src="{{asset('uploads/product/')}}/{{$cart->connect_to_product_table->product_thumbnail_photo}}" alt="" width="80px"></td>
                                    <td class="product"><a href="single-product.html">{{$cart->connect_to_product_table->product_name}}</td>
                                    <td class="ptice">${{$cart->connect_to_product_table->product_price}}</td>
                                    <input type="hidden" name="cart_id[]" value="{{$cart->id}}">
                                    <td class="quantity cart-plus-minus">
                                        <input type="text" name="cart_quantity[]" value="{{$cart->amount}}" />
                                    </td>
                                    <td class="total">${{$cart->connect_to_product_table->product_price * $cart->amount}}</td>
                                    <td class="remove"><a href="{{url('delete/cart')}}/{{$cart->id}}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row mt-60">
                            <div class="col-xl-4 col-lg-5 col-md-6 ">
                                <div class="cartcupon-wrap">
                                    <ul class="d-flex">
                                        <li>
                                            <button type="submit">Update Cart</button>
                                            </form>
                                        </li>
                                        <li><a href="shop.html">Continue Shopping</a></li>
                                    </ul>
                                    <h3>Cupon</h3>
                                    <p>Enter Your Cupon Code if You Have One</p>
                                    <div class="cupon-wrap">
                                        <input type="text" id="coupon_code" placeholder="Cupon Code">
                                        <button id="apply_btn">Apply Cupon</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 offset-xl-5 col-lg-4 offset-lg-3 col-md-6">
                                <div class="cart-total text-right">
                                    <h3>Cart Totals</h3>
                                    <ul>
                                        <li><span class="pull-left">Subtotal </span>${{cart_sub_total()}}</li>
                                        @if(isset($discount_amounts))
                                        <li><span class="pull-left">Discount </span>{{$discount_amounts}}%</li>
                                        @endif
                                        <li><span class="pull-left"> Total </span> $
                                            @if(isset($discount_amounts))
                                            {{$total_price = cart_sub_total() - ($discount_amounts/100) * cart_sub_total()}}
                                            @else 
                                            {{$total_price = cart_sub_total()}}
                                            @endif
                                        </li>
                                    </ul>
                                    <form action="{{url('checkout')}}" method="POST">
                                        @csrf
                                        <input type="hidden" name="total" value="{{$total_price}}">
                                        <button type="submit" class="btn btn-danger">Proceed to Checkout</button> 
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- cart-area end -->
@endsection
@section('footer_script')
<script>
    $(document).ready(function(){
        $('#apply_btn').click(function(){
            var coupon_code = $('#coupon_code').val();
            var link_to_go = '{{url('cart')}}/'+coupon_code;
            window.location.href = link_to_go;
        });
    });
</script>
@endsection
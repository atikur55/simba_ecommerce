@extends('layouts.frontend')
@section('content')
<div class="breadcumb-area bg-img-4 ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcumb-wrap text-center">
                        <h2>Your Search Product</h2>
                        <ul>
                            <li><a href="{{url('/')}}">Home</a></li>
                            <li><span>Search</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</div>
<div class="product-area">
        <div class="fluid-container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Our Latest Product</h2>
                        <img src="assets/images/section-title.png" alt="">
                    </div>
                </div>
            </div>
            <ul class="row">
              @foreach($searched as $product)
                <li class="col-xl-3 col-lg-4 col-sm-6 col-12">
                    <div class="product-wrap">
                        <div class="product-img">
                            <span>Sale</span>
                            <img src="{{asset('uploads/product/')}}/{{$product->product_thumbnail_photo}}" alt="">
                            <div class="product-icon flex-style">
                                <ul>
                                    <li><a data-toggle="modal" data-target="#{{$product->id}}" href="javascript:void(0);"><i class="fa fa-eye"></i></a></li>
                                    <li><a href="wishlist.html"><i class="fa fa-heart"></i></a></li>
                                    <li><a href="cart.html"><i class="fa fa-shopping-bag"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="product-content">
                            <h3><a href="{{route('product.show',$product->product_slug)}}">{{$product->product_name}} | Category::{{App\category::find($product->category_id)->category_name}}</a></h3>
                            <p class="pull-left">${{$product->product_price}}

                            </p>
                            <ul class="pull-right d-flex">
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-half-o"></i></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <div class="modal fade" id="{{$product->id}}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body d-flex">
                <div class="product-single-img w-50">
                    <img src="{{asset('uploads/product/')}}/{{$product->product_thumbnail_photo}}" alt="">
                </div>
                <div class="product-single-content w-50">
                    <h3>{{$product->product_name}}</h3>
                    <div class="rating-wrap fix">
                        <span class="pull-left">${{$product->product_price}}</span>
                        <ul class="rating pull-right">
                            @if(review_star_amount($product->id) == 1)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 1.5)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-half-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 2)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 2.5)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-half-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 3)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 3.5)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-half-o"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 4)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-o"></i></li>
                            @elseif(review_star_amount($product->id) == 4.5)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star-half-o"></i></li>
                            @elseif(review_star_amount($product->id) == 5)
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                               <li><i class="fa fa-star"></i></li>
                            @else
                            <li>Not review yet</li>
                            @endif
                            <li>(0{{App\Order_list::where('product_id',$product->id)->whereNotNull('review')->count()}}  Customar Review)</li>
                        </ul>
                    </div>
                    <p>{{$product->product_long_description}}</p>
                    <ul class="input-style">
                        <li class="quantity cart-plus-minus">
                            <input type="text" value="1" />
                        </li>
                        <li><a href="cart.html">Add to Cart</a></li>                       
                    </ul>
                    <ul class="cetagory">
                        <li>Categories:</li>
                        <li><a href="#">{{$product->connect_category_name->category_name}}</a></li>
                        
                    </ul>
                    <ul class="socil-icon">
                        <li>Share :</li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
                @endforeach

                <li class="col-12 text-center">
                    <a class="loadmore-btn" href="javascript:void(0);">Load More</a>
                </li>
            </ul>
        </div>
    </div>

@endsection
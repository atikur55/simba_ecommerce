<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Product_details;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Image;

class ProductController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except('[show]');
        // $this->middleware('verified')->except('[show]');
         
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('admin.product.index',compact('categories','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $product)
    {
        return view('admin.product.product_view');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_slug = Str::slug($request->product_name. '-'.Carbon::now()->timestamp);

        $product_id = Product::insertGetId([
          'category_id' => $request->category_id,
          'product_name' => $request->product_name,
          'product_price' => $request->product_price,
          'product_short_description' => $request->product_short_description,
          'product_long_description' => $request->product_long_description,
          'quantity' => $request->quantity,
          'product_slug' => $product_slug,
          'created_at' => Carbon::now(),
        ]);

        $uploaded_product_thumbnail_photo = $request->file('product_thumbnail_photo');
        $new_product_thumbnail_photo_name = $product_id.'.'.$uploaded_product_thumbnail_photo->extension();
        $new_product_thumbnail_photo_location = base_path('public/uploads/product/'.$new_product_thumbnail_photo_name);
        Image::make($uploaded_product_thumbnail_photo)->resize(600,622)->save($new_product_thumbnail_photo_location);

        Product::find($product_id)->update([
          'product_thumbnail_photo' => $new_product_thumbnail_photo_name,
        ]);

        $all_multiple_image = $request->file('product_multiple_photo');
        $flag = 1;
        foreach($all_multiple_image as $single_image)
        {
            $new_product_multiple_photo_name = $product_id.'-'.$flag.'.'.$single_image->extension();
            $new_product_photo_location = base_path('public/uploads/product/product-details/'.$new_product_multiple_photo_name);
            Image::make($single_image)->resize(600,622)->save($new_product_photo_location);

            product_details::insert([
              'product_id' => $product_id,
              'product_multiple_photo_name' => $new_product_multiple_photo_name,
              'created_at' => Carbon::now(),
            ]);

            $flag++;

        }
        return back()->with('product_success','Product Add Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
      $product_details = Product::where('product_slug',$slug)->first();
      $related_products = Product::where('category_id',$product_details->category_id)->get();
      return view('frontend.product_details',compact('product_details','related_products'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

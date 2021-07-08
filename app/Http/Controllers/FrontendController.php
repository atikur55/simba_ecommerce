<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Faq;
use Spatie\QueryBuilder\QueryBuilder;


class FrontendController extends Controller
{
    public function index(){
      $categories = Category::all();
      $products = Product::all();
      return view('frontend.index',compact('categories','products'));
    }
    public function about(){
      return view('frontend.about');
    }
    public function contact(){
      return view('frontend.contact');
    }
    public function faq(){
      $faqs = Faq::all();
      return view('frontend.faq',compact('faqs'));
    }
    public function shop(){
      $all_products = Product::all();
      $categories = Category::all();
      return view('frontend.shop',compact('all_products','categories'));
    }
    public function search()
    {
      $search_product = QueryBuilder::for(Product::class)
      ->allowedFilters('product_name','category_id')
      ->get();
      if($_GET['sort'] == 'product_price'){
        $searched = $search_product->sortBy('product_price');
      } 
      else {
        $searched = $search_product->sortByDesc('product_price');
      }     
      return view('frontend.search',compact('searched'));
    }
    
}

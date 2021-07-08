<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use softDeletes;
    protected $guarded = [];
    public function get_multiple_photo(){
      return $this->hasMany('App\Product_details','product_id');
    }
    public function connect_category_name(){
      return $this->belongsTo('App\Category','category_id');
    }
}

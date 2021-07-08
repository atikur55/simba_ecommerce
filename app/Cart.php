<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $guarded = [];
    public function connect_to_product_table()
    {
    	return $this->belongsTo('App\Product','product_id');
    }
}

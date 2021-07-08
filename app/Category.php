<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function connect_to_users_table()
    {
      return $this->belongsTo('App\User','added_by');
    }
    public function connect_to_product_table()
    {
    	return $this->hasMany('App\Product');
    }
}

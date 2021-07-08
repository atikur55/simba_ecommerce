<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function connect_to_counties()
    {
    	return $this->belongsTo('App\Country','country_id');
    }
    public function connect_to_cities()
    {
    	return $this->belongsTo('App\City','city_id');
    }
    
}

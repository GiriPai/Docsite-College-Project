<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }
    public function hospital(){
    	return $this->belongsTo('App\Models\Hospital');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Category;

class Hospital extends Model
{
    public function doctors(){
    	return $this->hasMany('App\Models\Doctor');
    }

    public function category(){
    	return $this->belongsTo('App\Models\Category');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;
use App\Models\Hospital;


class Category extends Model
{
    public function doctors(){
    	return $this->hasMany('Doctor');
    }
    public function hospitals(){
    	return $this->hasMany('Hospital');
    }
}

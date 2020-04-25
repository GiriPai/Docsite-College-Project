<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    public function doctor(){
    	return $this->belongsTo('App\Models\Doctor');
    }

    public function patient(){
    	return $this->belongsTo('App\User');
    }
}

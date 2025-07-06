<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $fillable =[
        "district_id",
        "title",
        "altitude",
        "longitude",
        
    ];
    function district(){
        return $this->belongsTo(District::class);
    }
    function property(){
        return $this->hasMany(Property::class);
    }
}

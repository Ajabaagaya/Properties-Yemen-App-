<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    protected $fillable =[
        "property_id",
        "floor_id"
    ];
    public function property(){
        return $this->belongsTo(Property::class);
    }
}

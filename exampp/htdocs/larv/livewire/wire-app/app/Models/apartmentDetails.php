<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class apartmentDetails extends Model
{
    protected $fillable = [
        "property_id",
        "floor_id",
        "room_no",
        "bedrooms",
        "bathrooms",
        "hall",
        "kitchen",
        "has_balcony",
        "floors",
    ];
    function property(){
        return $this->belongsTo(Property::class);
    }
    function floor(){
        return $this->belongsTo(Floor::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class roomDetails extends Model
{
    
    protected $fillable = [
        "property_id",
        "in_apartment",
        "has_private_bathroom",
        "furnished",
    ];
    public function property(){
        return $this->belongsTo(Property::class);
    }
    
}

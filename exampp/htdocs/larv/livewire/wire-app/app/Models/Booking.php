<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable=[
        "user_id",
        "property_id",
        "status",
        "start_date",
        "end_date"
    ];
    public function User(){
        return $this->hasOne(User::class);
     }
     public function Property(){
        
        return $this->hasOne(Property::class);
     }

}

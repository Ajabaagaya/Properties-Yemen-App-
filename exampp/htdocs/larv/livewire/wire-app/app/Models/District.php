<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable =[
        "city_id",
        "street",
        "name",

    ];
    // public function User(){
    //     return $this->hasOne(User::class);
    //  }
     public function city(){
        return $this->belongsTo(City::class);
     }
 
     public function apartment(){
      return $this->hasManyThrough(apartmentDetails::class,Property::class);
   }
     public function streets(){
      return $this->hasMany(Street::Class);
   }
}
     
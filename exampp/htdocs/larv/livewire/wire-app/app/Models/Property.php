<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        "primary_path",
        "user_id",
        "name",
        "type",
        "district_id",
        "description",
        "address",
        "price",
        "status",
        "is_verified"
    ];
    public function photos(){
        return $this->hasMany(Photo::class);
    }

    public function user(){
        return $this->hasOne(User::class);
     }
     public function street(){
        return $this->belongsTo(Street::class);
     }
    
    public function apartment(){
        return $this->hasOne(apartmentDetails::class);
    }
    public function villa(){
        return $this->hasOne(villaDetails::class);
    }
    public function room(){
        return $this->hasOne(roomDetails::class);
     }
    public function floor(){
        return $this->hasMany(Floor::class);
    }
}
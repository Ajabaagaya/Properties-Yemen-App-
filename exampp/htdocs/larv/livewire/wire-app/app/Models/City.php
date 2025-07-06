<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class City extends Model
{
    protected $fillable =[
        "name"
    ];
    public function property(){
        return $this->HasManyThrough(Street::class,District::class);
    } 
    public function district(){
        return $this->hasMany(District::class);
    }
}

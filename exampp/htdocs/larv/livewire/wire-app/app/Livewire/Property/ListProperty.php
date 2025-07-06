<?php

namespace App\Livewire\Property;
use App\Models\Property;
use App\Models\City;
use Livewire\Component;
use Illuminate\Http\Request;


class ListProperty extends Component
{   
 
    
 
   
    public function render(){
    // $cities=City::get();

    // $properties = Property::get();
    

        return view('livewire.property.list-property');
        // ->layout("layouts.app",["title"=>"List"]);
    }
}

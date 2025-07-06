<?php

namespace App\Livewire\Property;
use App\Models\Property;
use App\Models\City;
use Livewire\Component;
use  Illuminate\Support\Facades\Auth;


class PropertyFilter extends Component
{   public $city;
   public $city1;
   public $selectedCity='';
    public $type;
    public $message;
    public  function mount()
    {
        // $this->message="mounted";
    }
    public function render()
    {   $message= 'no filtered';
        $cities = City::get();
        
        // $filters = $cities->find(1)->property->collect();
        // if($this->city1){
        //     $filters = $cities->find($this->city1)->property->collect();

        // }if($this->type){
        //     $filters = property::where("type",$this->type)->get()->collect();
        // }
     
        $properties = Property::all();
        

        return view('livewire.property.property-filter',compact(
            "cities",
            "properties"
        ))
        ->layout("layouts.app",["title"=>"List"]);
        
    }
}

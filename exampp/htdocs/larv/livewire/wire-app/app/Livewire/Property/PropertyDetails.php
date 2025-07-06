<?php

namespace App\Livewire\Property;
use App\Models\Property;
use App\Models\Photo;
use Livewire\Component;

class PropertyDetails extends Component
{
    public function render(string $id)
    {   $property = Property::find($id);
        $photos = Photo::where("property_id", $id)->get();
        return view('livewire.property.property-details',compact("property","photos"))
        ->layout("layouts.app",["title"=>"Property Details"]);
    }
}

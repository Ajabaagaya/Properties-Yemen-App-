<?php

namespace App\Livewire\Property;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;
use App\Models\User;

use App\Models\City;
use App\Models\District;
use App\Models\Street;
use App\Models\Img;
use App\Models\apartmentDetails;
use App\Models\roomDetails;
use App\Models\villaDetails;
use App\Models\Property;

class Mybookings extends Component
{
    public $alert;
    

    public function navigate(string $id){
        $property = Property::where("id",$id)->get()[0];
        $this->alert=true;
        $f = $this->alert;
         return view('livewire.property.owner-form',compact("f","property"))
         ->layout("layouts.app",["title"=>"my bookings "]);
    }
    public function render()
    {
        $bookings = User::find(Auth::id())->property;
        return view('livewire.property.mybookings',compact('bookings'))
        ->layout("layouts.app",["title"=>"my bookings "]);
    }
}

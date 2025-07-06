<?php

namespace App\Livewire\Property;

use Livewire\Component;

class EditOwnerProperty extends Component
{   
    
    public function render()
    {
        return view('livewire.property.edit-owner-property')
        ->layout('layouts.app',["title"=>"edit form"]);
    }
}

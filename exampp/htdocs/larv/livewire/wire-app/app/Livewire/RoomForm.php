<?php

namespace App\Livewire;

use App\Models\roomDetails;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Filament\Forms\Components\Toggle;
use Illuminate\Contracts\View\View;

class RoomForm extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Toggle::make("has_private_bathroom")
                ->label("يتوفر حمام خاص"),
                Toggle::make("furnished")
                ->label("مفروش")
            ])
            ->statePath('data')
            ->model(roomDetails::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = roomDetails::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.property.room-form')
        ->layout("layouts.app",["title"=>"From"]);
        ;
    }
}
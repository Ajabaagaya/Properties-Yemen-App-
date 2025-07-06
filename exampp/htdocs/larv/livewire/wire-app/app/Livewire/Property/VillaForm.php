<?php

namespace App\Livewire\property;

use App\Models\VillaDetails;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class VillaForm extends Component implements HasForms
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
                Forms\Components\TextInput::make('property_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('floors')
                    ->numeric(),
                Forms\Components\Toggle::make('has_gardan')
                    ->required(),
                Forms\Components\TextInput::make('area_size')
                    ->numeric(),
            ])
            ->statePath('data')
            ->model(VillaDetails::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = VillaDetails::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.property.villa-form')
        ->layout("layouts.app",["title"=>"From"]);
        ;
    }
}
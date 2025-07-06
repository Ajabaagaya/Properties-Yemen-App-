<?php

namespace App\Livewire\property;

use App\Models\apartmentDetails;
use Filament\Forms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;
use Illuminate\Contracts\View\View;

class ApartmentCreate extends Component implements HasForms
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
                Forms\Components\TextInput::make('rooms')
                    ,
                Forms\Components\TextInput::make('bathrooms')
                    ->required()
                    ->numeric()
                    ->default(0),
                Forms\Components\Toggle::make('kitchen')
                    ->required(),
                Forms\Components\Toggle::make('furnished')
                    ->required(),
                Forms\Components\TextInput::make('floors')
                    ->numeric(),
            ])
            ->statePath('data')
            ->model(apartmentDetails::class);
    }

    public function create(): void
    {
        $data = $this->form->getState();

        $record = apartmentDetails::create($data);

        $this->form->model($record)->saveRelationships();
    }

    public function render(): View
    {
        return view('livewire.property.apartment-create')
        ->layout("layouts.app",["title"=>"Apartment"]);
    }
}
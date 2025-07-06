<?php

namespace App\Livewire;
use Filament\Tables\Columns\TextColumn;

use App\Models\Property;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;

class tableProperty extends Component implements HasForms, HasTable
{
    use InteractsWithForms;
    use InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Property::query())
            ->columns([
                TextColumn::make("name")
                ->label("")

                ->searchable(),
                TextColumn::make("type")
                ->label("النوع")

                ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                //
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    //
                ]),
            ]);
    }

    public function render(): View
    {
        return view('livewire.property.table-property')
        ->layout("layouts.app",["title"=>"table"]);
    }
}

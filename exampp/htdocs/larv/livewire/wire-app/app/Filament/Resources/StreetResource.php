<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StreetResource\Pages;
use App\Filament\Resources\StreetResource\RelationManagers;
use App\Models\Street;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\{TextInput,Group,Tabs};
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
// use Filament\Forms\Components\Select;

class StreetResource extends Resource
{
    protected static ?string $model = Street::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make("district_id")
                ->relationship("district","name")
                ->label("اسم المنطقة"),
                TextInput::make("title")
                ->required()
                ->label("اسم الشارع"),


                Hidden::make("altitude")
                ->dehydrated(true),
                
                Hidden::make("longitude")
                ->dehydrated(true),
                ViewField::make("mapPicker")
                ->label("حدد مواقع الشارع")
                ->view("forms.components.map-picker")
                ->extraAttributes([
                    'data-lat-field'=>'altitude',
                    'data-lng-field'=>'longitude',
                ])
                ->dehydrated(false)
                ->columnSpanFull()
            ]);
    }
    public static function beforeCrate(Form $form,Model $record){
        logger($form->getState());
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("title")
                ->label("العنوان")
                ->searchable(),
                TextColumn::make("longitude")
                ->label("longitude")
                // ->searchable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStreets::route('/'),
            'create' => Pages\CreateStreet::route('/create'),
            'edit' => Pages\EditStreet::route('/{record}/edit'),
        ];
    }
}

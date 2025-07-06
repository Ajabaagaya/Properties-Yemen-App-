<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ApartmentDetailsResource\Pages;
use App\Filament\Resources\ApartmentDetailsResource\RelationManagers;
use App\Models\ApartmentDetails;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
// use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
// use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
class ApartmentDetailsResource extends Resource
{
    protected static ?string $model = ApartmentDetails::class;
    protected static ?string $modelLabel='شقق';
    protected static ?string $navigationLabel='شقق';
    
    protected static ?string $navigationIcon = 'heroicon-o-home-modern';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make("property_id")
                ->label("العقار")
                ->relationship("property","name")
                ->required(),
                // Select::make("floor_id")
                // ->relationship("floor","id")
                // ->label("الدور")
                // ->required(),
                TextInput::make("room_no")
                ->label("رقم الغرفة")
                ->required(),
                TextInput::make("bedrooms")
                ->label("عداد الغرف")
                ->required(),
               Select::make("bathrooms")
               ->options([
                "one"=>"واحد",
                "two"=>"اثنين"
               ])
               ->label("دورات المياة"),
               Select::make("living_room")
               ->options([
                "sperated_bath"=>"مجلس وحمام منعزل",
                "no_bath"=>"مجلس منعزل بدون حمام",
                "no_existing"=>"لا يوجد"
               ])
               ->label("المجلس")
               ->required(),

            Select::make("hall")
                ->options([
                    "wide"=>"واسعة",
                    "middle"=>"متوسطة",
                    "no-exists"=>"لا يوجد",
                ])
                ->required()
                ->label("الصالة"),
            Toggle::make("kitchen")
                 ->label("يوجد مطبخ"),  
                 
            Toggle::make("kitchen")
                 ->label("يوجد بلكونة"), 
            TextInput::make("floor")
                 ->label("رقم الدور"),
            
            



            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('bedrooms')
                ->label("الغرف")

                ->searchable(),
                TextColumn::make("floor")
                ->label("الدور")

                ->searchable(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListApartmentDetails::route('/'),
            'create' => Pages\CreateApartmentDetails::route('/create'),
            'edit' => Pages\EditApartmentDetails::route('/{record}/edit'),
        ];
    }
}

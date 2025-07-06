<?php

namespace App\Filament\Resources;
// namespace App\Filament\Pages\ListRecords;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;
    protected static ?string $modelLabel=' الحجوزات';
    protected static ?int $navigationSort =3;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $activeNavigationIcon = 'heroicon-o-lock-open';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Forms\Components\Select::make("property_id")->relationship("property","name")->required(),
               Forms\Components\Select::make("user_id")->relationship("user","name")->required(),
               Forms\Components\DatePicker::make("start_date")->required(),
               Forms\Components\DatePicker::make("end_date")->required(),
               Forms\Components\Select::make("status")
                                     ->options([
                                        "pending",
                                        "approved",
                                        "rejected"
                                     ])
                                     ->label("العقار")
                                     
                                     
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            //
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}

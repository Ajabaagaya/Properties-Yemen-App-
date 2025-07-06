<?php

namespace App\Filament\Resources\ApartmentDetailsResource\Pages;

use App\Filament\Resources\ApartmentDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListApartmentDetails extends ListRecords
{
    protected static string $resource = ApartmentDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

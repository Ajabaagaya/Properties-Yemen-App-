<?php

namespace App\Filament\Resources\ApartmentDetailsResource\Pages;

use App\Filament\Resources\ApartmentDetailsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditApartmentDetails extends EditRecord
{
    protected static string $resource = ApartmentDetailsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

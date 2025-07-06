<?php

namespace App\Filament\Resources\StreetResource\Pages;

use App\Filament\Resources\StreetResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStreet extends EditRecord
{
    protected static string $resource = StreetResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

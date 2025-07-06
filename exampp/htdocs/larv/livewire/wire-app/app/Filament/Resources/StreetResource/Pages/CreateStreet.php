<?php

namespace App\Filament\Resources\StreetResource\Pages;

use App\Filament\Resources\StreetResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use  App\Models\Street;

class CreateStreet extends CreateRecord
{
    protected static string $resource = StreetResource::class;

    // public static function beforeCreate(CreateRecord $page)
    // {
    //     dd($page->data);

    // }
}

<?php

namespace App\Filament\Resources\PropertyResource\Pages;

use App\Filament\Resources\PropertyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProperty extends EditRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
    protected function afterCreate():void{
        $images = $this->form->getState()
        ['images'] ?? [];

        foreach($images as $image){
            $new_path = 'property/'.$this->record->id.'/'.
            basename($image);
            Storage::disk('public')->move($image, $new_path);
            $this->record->images()->create([
                'img' => $new_path,
            ]);
        }
    }
}

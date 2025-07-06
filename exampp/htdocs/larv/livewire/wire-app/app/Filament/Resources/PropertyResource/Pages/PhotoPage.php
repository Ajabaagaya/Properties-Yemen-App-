<?php

namespace App\Filament\Resources\PropertyResource\Pages;
use Filament\Actions;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\{TextInput,Group,Tabs};
use Filament\Forms;
use App\Filament\Resources\PropertyResource;
// use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class PhotoPage extends CreateRecord
{
    protected static string $resource = PropertyResource::class;

    protected function getSteps():array{
        return [
            Step::make("معلومات العقار")
            ->columns(2)
            ->description('معلومات عامة عن العقار')
            ->schema([
                TextInput::make("name")
                ->label("اسم العقار")
                ->live(onBlur: true)
                ->required(),
                Select::make("user_id")->relationship("user","name")
                ->label("اسم المالك")
                ->required(),
                Select::make("street_id")->relationship("street","title")
                ->label("اسم الشارع")
                ->required(),
                Select::make("type")
                ->options([
                    "apartment"=>"شقة",
                     "villa"=>"فيلا",
                     "room"=>"غرفة",
                ])
                ->label("نوع العقار"),

                Select::make("purpose")
                ->options([
                    "selling"=>"بيع",
                    "renting"=>"ايجار",
                ])
                ->label("الغرض"),
                TextInput::make("area_2m")
                ->label("مربع(مترxمتر) حجم العقار "),
                // Toggle::make("is_verified")
                // ->label("تم التوثيق"),
                TextInput::make("description")
                ->required(),
                Select::make("status")
                ->options([
                "available"=>"متاح",
                "pendding"=>"قيد المعالجة",
                "booked"=>"محجوز",
            ]),
            TextInput::make("price")
            ->label("مبلغ")
            ->required(),
            
            Toggle::make("negotiable")
            ->label("قابل لتفاوض"),

               FileUpload::make("primary_path")
               ->image()
               ->directory("primary_path/")
               ->preserveFilenames()
               ->reorderable()
               ->live()
               ->required()
               ->acceptedFileTypes(['image/jpeg','image/png','image/jpg','image/webp']),
            
            Hidden::make("altitude")
            ->dehydrated(true),
            Hidden::make("longitude")
            ->dehydrated(true),
                
            ViewField::make('map_picker')
            ->label("المواقع على الخريطة")
            ->view('forms.components.map-picker')
            ->dehydrated(false)
            ->columnSpanFull(),
            // ->extraAttributes([
            //     'data-lat-field'=>'altitude',
            //     'data-lng-field'=>'longitude',
        ]),];}
}

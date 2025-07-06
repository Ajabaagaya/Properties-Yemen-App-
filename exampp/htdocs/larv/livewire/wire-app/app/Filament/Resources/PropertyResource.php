<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource\RelationManagers;
use App\Models\Property;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\{TextInput,Group,Tabs};
use Filament\Forms;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Database\Eloquent\Model;
use Filament\Forms\Components\Wizard;
// use illuminate\Database\Eloquent\Model;
use App\Models\Img;
class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;
    protected static ?string $navigationLabel="العقارات";
    protected static ?string $modelLabel="العقارات";
    protected static ?string $navigationIcon = 'heroicon-o-building-library';
    public static function getNavigationBadge():string{
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        


        return $form
            ->schema([
            
                TextInput::make("name")
                ->label("اسم العقار")
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
        ]);
    }
    

    public static function getRelations(): array
    {
        return [
          RelationManagers\ApartmentRelationManager::class,
          RelationManagers\PhotosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
            'sort' => Pages\SortProperties::route('/sort'),
        ];
    }
}

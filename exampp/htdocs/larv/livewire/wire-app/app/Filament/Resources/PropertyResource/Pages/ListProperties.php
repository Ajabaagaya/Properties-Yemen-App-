<?php

namespace App\Filament\Resources\PropertyResource\Pages;
use App\Filament\Resources\PropertyResource;
use Filament\Resources\Components\Tab;
use Filament\Actions;
use Filament\Pages\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\CheckBox;
use Filament\Support\Enums\IconPosition;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Wizard;
use Filament\Resources\Pages\ListRecords;
use Filament\Actions\ViewAction;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;
// use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Property;
use App\Models\Photo;
use  Illuminate\Database\Eloquent\Builder;
class ListProperties extends ListRecords
{
    protected static string $resource = PropertyResource::class;

    public  function table(Table $table): Table
    {
        return $table
            ->striped()
            ->heading('Clients')
            ->columns([
                TextColumn::make("name")
                ->label("الاسم")

                ->searchable(),

                TextColumn::make("type")
                ->label("النوع") 
                ->searchable(),
                ImageColumn::make("primary_path")
                ->circular()
                ->label("الصورة"),


                TextColumn::make("status")
                ->label("الحالة")
                ->badge()
                ->color(fn(string $state):string=>match($state){
                    "available"=>"success",
                    "pendding"=>"danger",
                    "booked"=>"gray",
                })
                ->searchable(),
                TextColumn::make('user_id.name')
                ->label("المستخدم")

                ->searchable(),
                TextColumn::make("price")
                ->label("المبلغ")

                ->searchable(),
            ])
            ->filters([
                SelectFilter::make("status")
                ->options([
                    "available"=>"متاح",
                    "pendding"=>"قيد الانتظار",
                    "booked"=>"محجوز",
                ])
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
           
                // Action::make("create")
                // ->steps([
                //        Wizard\Step::make("Name")
                //        ->description("Give the category a unique name")
                //          ->schema([
                //               TextInput::make("name")
                //               ->label("Property Name")
                //               ->required(),
                //               TextInput::make("slug")
                //               ->disabled()
                //             ]),
    
    
                //          Wizard\Step::make("Visibility")  
                //          ->description("Control who can View it")
                //          ->schema([
                //             Toggle::make("is_visible")
                //             ->label("Visible to customers")
                //             ->default(true)
                //          ]),
                //          Wizard\Step::make("Details")
                //          ->schema([
                //               TextInput::make("description")
                //               ->label("Property Description")
                //               ->required(),
                //               Toggle::make("is_active")
                //               ->label("Is Active?")
                //               ->default(true),
                //             ]),        
                //     ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    protected function getHeaderActions(): array
    {
        return [
            // ViewAction::make()
            // // ->record($t)
            // ->form([
            //     TextInput::make("name")
            //     ->required()
            //     ->maxLength(255),
            // ]),
            // Action::make('delete')
            // ->requiresConfirmation()
            // ->action(fn()=>'')
            // ->modalIcon("heroicon-o-trash")
            // ->modalIconColor("danger")
            //  ->color("danger")
            // ->modalHeading("Delete the Post")
            // ->modalDescription("Delete the Post")
            // ->modalSubmitActionLabel("Yes, delete it."),
                // Action::make('delete')
            // ->requiresConfirmation()
            // ->action(fn()=>'')
            // ->modalIcon("heroicon-o-trash")
            // ->modalIconColor("danger")
            //  ->color("danger")
            // ->modalHeading("Delete the Post")
            // ->modalDescription("Delete the Post")
            // ->modalSubmitActionLabel("Yes, delete it."),
         
            Action::make("create")
            ->steps([
                   Wizard\Step::make("Name")
                   ->description("Give the category a unique name")
                     ->schema([
                          TextInput::make("name")
                          ->label("Property Name")
                          ->required(),
                          TextInput::make("slug")
                          ->disabled()
                        ]),


                     Wizard\Step::make("Visibility")  
                     ->description("Control who can View it")
                     ->schema([
                        Toggle::make("is_visible")
                        ->label("Visible to customers")
                        ->default(true)
                     ]),
                     Wizard\Step::make("Details")
                     ->schema([
                          TextInput::make("description")
                          ->label("Property Description")
                          ->required(),
                          Toggle::make("is_active")
                          ->label("Is Active?")
                          ->default(true),
                        ]),        
                ]),

            Actions\ActionGroup::make([
                Action::make("print")
                   ->form([
                           CheckBox::make("name")
                           ->label("الاسم"),
                             CheckBox::make("status")
                           ->label("الحالة"),
                             CheckBox::make("purpose")
                           ->label("الغرض"),
                             CheckBox::make("type")
                           ->label("النوع"),
                             CheckBox::make("description")
                           ->label("الوصف"),
                           
                   ])
                //    ->slideOver()
                   ->stickyModalHeader()
                   ->action(function(array $data, Property $record):void{

                   }) ,

                Action::make("edit"),
                Action::make("delete"),
            ])
            ->tooltip("actions")
            ->label("actions")
            ->button(),
            // Actions\Action::make("customReport")
            // ->label("تصدير التقرير")
            // ->icon("heroicon-o-document-arrow-down")
            // ->color("secondary"),
            
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs():array{
             return[
                "all"=>Tab::make("الكل"),
                "building"=>Tab::make("المبني")
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('type','building'))
                ->icon('heroicon-o-home-modern')
                ->iconPosition(IconPosition::After)
                ->badge(Property::query()->where("type","building")->count()),
               
                "apartment"=>Tab::make("الشقق")
                ->iconPosition(IconPosition::After)
                ->extraAttributes(["data-cy"=>"Clicked"])
                ->icon("heroicon-m-user-group")
                ->badge(Property::query()->where("type","apartment")->count())
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('type','apartment')),
                
                
                "room"=>Tab::make("الغرف")
                ->badge(Property::query()->where("type","room")->count())
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('type','room'))
                ->icon('heroicon-o-home-modern'),
                
                "villa"=>Tab::make("الفلل")
                ->iconPosition(IconPosition::After)
                ->badge(Property::query()->where("type","villa")->count())
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('type','villa'))
                ->iconPosition(IconPosition::After)
                ->icon('heroicon-o-home-modern'),
                "shop"=>Tab::make("المحلات")
                ->badge(Property::query()->where("type","shop")->count())
                ->iconPosition(IconPosition::After)
                ->modifyQueryUsing(fn(Builder $query)=>$query->where('type','shop'))
                ->icon('heroicon-o-home-modern'),

             ];

    }
    public function getDefaultActiveTab():string {
        return "all";
    }

}

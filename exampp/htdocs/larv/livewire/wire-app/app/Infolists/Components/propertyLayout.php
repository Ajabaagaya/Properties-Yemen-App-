<?php

namespace App\Infolists\Components;

use Filament\Infolists\Components\Component;
use Filament\Infolists\Components\TextEntry;

// TextEntry::make("name")
class propertyLayout extends Component
{
    protected string $view = 'infolists.components.property-layout';
    public static function make(): static
    {
        return app(static::class);
    }
}

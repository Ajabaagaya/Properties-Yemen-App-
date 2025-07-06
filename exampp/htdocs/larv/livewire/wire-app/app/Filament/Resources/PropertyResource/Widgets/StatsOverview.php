<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected ?string $heading='اضافة شقة جديدة';

    protected function getStats(): array
    {
        return [
            Stat::make('Unique views','192.1k')
               ->description("32k increase")
               ->descriptionIcon("heroicon-m-arrow-trending-up")
               ->color("success"),
            Stat::make('Bounce rate','19%'),
            Stat::make('Avarge Time page','3:11'),
        ];
    }
}

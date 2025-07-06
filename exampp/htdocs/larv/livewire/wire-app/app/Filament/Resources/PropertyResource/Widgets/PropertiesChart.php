<?php

namespace App\Filament\Resources\PropertyResource\Widgets;

use Filament\Widgets\ChartWidget;

class PropertiesChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            'datasets'=>[
                [
                'label'=>"عداد العقارات",
                'data'=>[12,32,34,54,645,66],
                'backgroundColor'=>"#3b82f6",
                ],
            ],
            'labels'=>[
                'Feb','Mar','Apr','May','Dec'
            ]

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}

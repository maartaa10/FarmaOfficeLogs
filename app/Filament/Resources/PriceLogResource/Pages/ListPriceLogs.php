<?php

namespace App\Filament\Resources\PriceLogResource\Pages;

use App\Filament\Resources\PriceLogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPriceLogs extends ListRecords
{
    protected static string $resource = PriceLogResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}

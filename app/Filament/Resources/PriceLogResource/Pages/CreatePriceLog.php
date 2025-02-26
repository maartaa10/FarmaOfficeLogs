<?php

namespace App\Filament\Resources\PriceLogResource\Pages;

use App\Filament\Resources\PriceLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePriceLog extends CreateRecord
{
    protected static string $resource = PriceLogResource::class;

    protected function getView(): string
    {
        return 'filament.resources.price-log.create-price-log';
    }
}
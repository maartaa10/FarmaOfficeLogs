<?php

namespace App\Filament\Resources\PriceLogResource\Pages;

use App\Filament\Resources\PriceLogResource;
use Filament\Resources\Pages\CreateRecord;

class CreatePriceLog extends CreateRecord
{
    public static string $resource = PriceLogResource::class;

    public static string $view = 'filament.resources.price-log.create-price-log';
}
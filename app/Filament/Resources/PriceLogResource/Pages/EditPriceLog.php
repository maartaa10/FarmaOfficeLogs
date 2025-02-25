<?php

namespace App\Filament\Resources\PriceLogResource\Pages;

use App\Filament\Resources\PriceLogResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriceLog extends EditRecord
{
    protected static string $resource = PriceLogResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}

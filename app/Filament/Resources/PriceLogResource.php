<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceLogResource\Pages;
use App\Models\PriceLog;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class PriceLogResource extends Resource
{
    protected static ?string $model = PriceLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive'; // Use a valid icon name

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Define your form schema here
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                // Define your table columns here
            ])
            ->filters([
                // Define your table filters here
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPriceLogs::route('/'),
            'create' => Pages\CreatePriceLog::route('/create'),
            'edit' => Pages\EditPriceLog::route('/{record}/edit'),
        ];
    }
}
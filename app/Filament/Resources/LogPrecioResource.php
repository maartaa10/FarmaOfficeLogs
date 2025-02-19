<?php

// app/Filament/Resources/LogPrecioResource.php

namespace App\Filament\Resources;

use App\Models\LogPrecio;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Resources\Table;
use Filament\Resources\Form;

class LogPrecioResource extends Resource
{
    public static $model = LogPrecio::class;


    

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id')->label('Product ID'),
                Tables\Columns\TextColumn::make('pharmacy_id')->label('Pharmacy ID'),
                Tables\Columns\TextColumn::make('old_price')->label('Old Price'),
                Tables\Columns\TextColumn::make('new_price')->label('New Price'),
                Tables\Columns\TextColumn::make('change_date')->label('Change Date')->dateTime(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('pharmacy_id')
                    ->options(Pharmacy::all()->pluck('name', 'id'))
                    ->label('Farmacia'),
                Tables\Filters\SelectFilter::make('product_id')
                    ->options(Product::all()->pluck('name', 'id'))
                    ->label('Producto'),
            ]);
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('product_id')->label('Product ID'),
            Forms\Components\TextInput::make('pharmacy_id')->label('Farmacy ID'),
            Forms\Components\TextInput::make('old_price')->label('Old Price'),
            Forms\Components\TextInput::make('new_price')->label('New Price'),
            Forms\Components\TextInput::make('source')->label('Source'),
        ]);
    }
}

<?php
namespace App\Filament\Resources;

use App\Filament\Resources\PriceLogResource\Pages;
use App\Models\PriceLog;
use App\Models\Farmacia;
use App\Models\Product;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class PriceLogResource extends Resource
{
    protected static ?string $model = PriceLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('farmacia_id')
                    ->label('Farmacia')
                    ->options(Farmacia::all()->pluck('name', 'id')->toArray())
                    ->required(),

                Forms\Components\Select::make('product_id')
                    ->label('Producto')
                    ->options(Product::all()->pluck('name', 'id')->toArray())
                    ->required(),

                Forms\Components\TextInput::make('old_price')
                    ->label('Precio Anterior')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('new_price')
                    ->label('Nuevo Precio')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('old_stock')
                    ->label('Stock Anterior')
                    ->numeric()
                    ->nullable(),

                Forms\Components\TextInput::make('new_stock')
                    ->label('Nuevo Stock')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('source')
                    ->label('Fuente')
                    ->required(),

                Forms\Components\DateTimePicker::make('change_date')
                    ->label('Fecha del Cambio')
                    ->default(now())
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('farmacia.name')->label('Farmacia'),
                Tables\Columns\TextColumn::make('product.name')->label('Producto'),
                Tables\Columns\TextColumn::make('old_price')->label('Precio Anterior'),
                Tables\Columns\TextColumn::make('new_price')->label('Nuevo Precio'),
                Tables\Columns\TextColumn::make('created_at')->label('Fecha'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('farmacia_id')
                    ->label('Farmacia')
                    ->options(Farmacia::all()->pluck('name', 'id')->toArray()),

                Tables\Filters\SelectFilter::make('product_id')
                    ->label('Producto')
                    ->options(Product::all()->pluck('name', 'id')->toArray()),
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

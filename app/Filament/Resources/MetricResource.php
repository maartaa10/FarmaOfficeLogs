<?php
// app/Filament/Resources/MetricResource.php
namespace App\Filament\Resources;

use App\Models\Metric;
use Filament\Resources\Resource;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables;
use Filament\Forms;

class MetricResource extends Resource
{
    // Definir el modelo como una constante
    const MODEL = Metric::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('product_id')->required(),
                Forms\Components\TextInput::make('pharmacy_id')->required(),
                Forms\Components\TextInput::make('old_price')->nullable(),
                Forms\Components\TextInput::make('new_price')->required(),
                Forms\Components\TextInput::make('old_stock')->nullable(),
                Forms\Components\TextInput::make('new_stock')->required(),
                Forms\Components\TextInput::make('source')->required(),
                Forms\Components\DateTimePicker::make('change_date')->default(now()),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_id'),
                Tables\Columns\TextColumn::make('pharmacy_id'),
                Tables\Columns\TextColumn::make('old_price'),
                Tables\Columns\TextColumn::make('new_price'),
                Tables\Columns\TextColumn::make('old_stock'),
                Tables\Columns\TextColumn::make('new_stock'),
                Tables\Columns\TextColumn::make('source'),
                Tables\Columns\TextColumn::make('change_date'),
            ])
            ->filters([
                Tables\Filters\Filter::make('pharmacy')
                    ->query(fn ($query) => $query->where('pharmacy_id', request('pharmacy_id')))
            ])
            ->actions([
                Tables\Actions\Action::make('view')
                    ->url(fn (Metric $record): string => route('filament.resources.metrics.view', $record)),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMetrics::route('/'),
            'create' => CreateRecord::route('/create'),
            'edit' => EditRecord::route('/{record}/edit'),
      
        ];
    }
}

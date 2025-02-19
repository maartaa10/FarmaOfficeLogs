<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Forms;
use App\Models\Log;

class LogsDashboard extends Page
{
    protected $view = 'filament.pages.logs-dashboard';  

    public function mount(): void
    {
        $this->table = Tables\Table::make('logs')
            ->columns([
                Tables\Columns\Text::make('message'),
                Tables\Columns\Text::make('context'),
                Tables\Columns\Text::make('level'),
                Tables\Columns\Text::make('level_name'),
                Tables\Columns\Text::make('channel'),
                Tables\Columns\Text::make('datetime'),
                Tables\Columns\Text::make('extra'),
            ])
            ->filters([
                Tables\Filters\Search::make('search')
                    ->placeholder('Search logs...'),
            ])
            ->defaultSort('datetime', 'desc')
            ->pagination(false)
            ->query($this->getTableQuery());
    }

    public function getTableQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return Log::query();
    }

    public function render()
    {
        return view('filament.pages.logs-dashboard');
    }
}

<?php

namespace App\Filament\Resources\PriceLogResource\Widgets;

use App\Models\Metric;
use Filament\Widgets\LineChartWidget;

class PriceLogChart extends LineChartWidget
{
    protected static ?string $heading = 'Evolución de precios por producto';

    public $pharmacy_id;
    public $product_id;

    protected function getData(): array
    {
        $query = Metric::query();

        if ($this->pharmacy_id) {
            $query->where('pharmacy_id', $this->pharmacy_id);
        }

        if ($this->product_id) {
            $query->where('product_id', $this->product_id);
        }

        $metrics = $query->orderBy('change_date', 'asc')->get();

        $labels = $metrics->pluck('change_date')->map(function ($date) {
            return $date->format('Y-m-d');
        })->toArray();

        $data = $metrics->pluck('new_price')->toArray();

        return [
            'datasets' => [
                [
                    'label' => 'Precios',
                    'data' => $data,
                    'borderColor' => '#4caf50',
                    'fill' => false,
                    'lineTension' => 0.4,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getFilters(): array
    {
        return [
            'pharmacy_id' => [
                'label' => 'Farmacia',
                'options' => Metric::pluck('pharmacy_id', 'pharmacy_id')->unique()->toArray(),
            ],
            'product_id' => [
                'label' => 'Producto',
                'options' => Metric::pluck('product_id', 'product_id')->unique()->toArray(),
            ],
        ];
    }
}
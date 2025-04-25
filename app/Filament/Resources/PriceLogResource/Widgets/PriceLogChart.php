<?php

namespace App\Filament\Resources\PriceLogResource\Widgets;

use App\Models\Metric;
use App\Models\Farmacia;
use Filament\Widgets\LineChartWidget;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

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
    
        $labels = $metrics->pluck('change_date')->map(fn ($date) => \Carbon\Carbon::parse($date)->format('Y-m-d'))->toArray();
        $data = $metrics->pluck('new_price')->toArray();
    
        Log::info('Datos de la gráfica:', ['labels' => $labels, 'data' => $data]); // 👀 Esto imprime los datos en storage/logs/laravel.log
    
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
            'options' => fn () => Farmacia::pluck('name', 'id')->toArray(),
        ],
        'product_id' => [
            'label' => 'Producto',
            'options' => fn () => Product::pluck('name', 'id')->toArray(),
        ],
    ];
}

}
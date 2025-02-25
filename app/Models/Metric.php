<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metric extends Model
{
    use HasFactory;

    protected $table = 'logs_precios';

    protected $fillable = [
        'product_id',
        'pharmacy_id',
        'old_price',
        'new_price',
        'old_stock',
        'new_stock',
        'source',
        'change_date',
    ];

    public $timestamps = true;
    public function farmacia()
    {
        return $this->belongsTo(Farmacia::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

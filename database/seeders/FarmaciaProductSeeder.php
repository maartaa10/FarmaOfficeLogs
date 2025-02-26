<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farmacia;
use App\Models\Product;

class FarmaciaProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $farmacias = [
            ['name' => 'Farmacia Central'],
            ['name' => 'Farmacia San Juan'],
            ['name' => 'Farmacia La Salud'],
            ['name' => 'Farmacia Del Pueblo'],
            ['name' => 'Farmacia Moderna'],
        ];

        foreach ($farmacias as $farmacia) {
            Farmacia::create($farmacia);
        }

        $productos = [
            ['name' => 'Paracetamol'],
            ['name' => 'Ibuprofeno'],
            ['name' => 'Omeprazol'],
            ['name' => 'Amoxicilina'],
            ['name' => 'Aspirina'],
            ['name' => 'Gelocatil'],
            ['name' => 'Voltaren'],
            ['name' => 'Frenadol'],
            ['name' => 'Dalsy'],
            ['name' => 'Efferalgan'],
        ];

        foreach ($productos as $producto) {
            Product::create($producto);
        }
    }
}

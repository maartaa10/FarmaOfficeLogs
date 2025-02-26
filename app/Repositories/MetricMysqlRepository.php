<?php

namespace App\Repositories;

use App\Models\Metric;
use App\Repositories\Interfaces\MetricRepositoryInterface;
use Exception;

class MetricMysqlRepository implements MetricRepositoryInterface
{
    // Guardar una nova metrica
    public function store(array $data)
    {
        try {
            return Metric::create($data);
        } catch (Exception $e) {
            throw new Exception("Error al almacenar la métrica: " . $e->getMessage());
        }
    }
  
    // Buscar metrica per id
    public function findById($id)
    {
        return Metric::find($id);
    }

    // Eliminar métrica
    public function delete($id)
    {
        $metric = Metric::find($id);
        if ($metric) {
            return $metric->delete();
        }
        return false;
    }

    //Obtenim totes les metriques
    public function findAll()
    {
        return Metric::all();
    }

    //Actualitzar una metrica per id
    public function update($id, array $data)
    {
        $metric = Metric::find($id);
        if ($metric) {
            $metric->update($data);
            return $metric;
        }
        return null;
    }

    // 🔶 6. Filtrar metriques per condicions (ej: pharmacy_id, product_id)
    public function findByFilters(array $filters)
    {
        $query = Metric::query();

        if (isset($filters['pharmacy_id'])) {
            $query->where('pharmacy_id', $filters['pharmacy_id']);
        }
        if (isset($filters['product_id'])) {
            $query->where('product_id', $filters['product_id']);
        }
        if (isset($filters['source'])) {
            $query->where('source', $filters['source']);
        }

        return $query->get();
    }
}

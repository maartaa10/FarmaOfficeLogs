<?php

// app/Services/MetricService.php
namespace App\Services;

use App\Repositories\Interfaces\MetricRepositoryInterface;
use Exception;

class MetricService
{
    protected $metricRepository;

    public function __construct(MetricRepositoryInterface $metricRepository)
    {
        $this->metricRepository = $metricRepository;
    }

    // Validem les dades abans de "passar-li" el treball al repositori
    

    public function validateMetricData(array $data)
    {
        // Verifiquem que new_price no sigui menor que old_price
        if ($data['new_price'] < $data['old_price']) {
            throw new Exception("El nuevo precio no puede ser menor que el precio antiguo.");
        }

        // Verifiquem que new_stock no sigui menor que old_stock
        if ($data['new_stock'] < $data['old_stock']) {
            throw new Exception("El nuevo stock no puede ser menor que el stock anterior.");
        }

        // Verifiquem que l'origen estigui entre els valors permitits
        $validSources = ['admin', 'system', 'API'];
        if (!in_array($data['source'], $validSources)) {
            throw new Exception("El origen debe ser uno de los siguientes: admin, system, API.");
        }

        // Verifiquem que el preu y el stock siguin valids
        if ($data['new_price'] <= 0) {
            throw new Exception("El nuevo precio debe ser mayor que 0.");
        }

        if ($data['new_stock'] < 0) {
            throw new Exception("El nuevo stock no puede ser negativo.");
        }

        // Verificar que la change_date no sigui futura
        if (isset($data['change_date']) && strtotime($data['change_date']) > time()) {
            throw new Exception("La fecha de cambio no puede ser en el futuro.");
        }

        return true;  // Si tot esta ok (les validacions passen), retornem true
    }

    public function storeMetric(array $data)
    {
        try {
            // Primer validem les dades
            $this->validateMetricData($data);

            // Li passem la persistencia al repositori
            return $this->metricRepository->store($data);
        } catch (Exception $e) {
            
            throw new Exception("Error al procesar los datos de la métrica: " . $e->getMessage());
        }
    }
    public function findAll() 
    {
        return $this->metricRepository->findAll();
    }
public function findById($id)
    {
        return $this->metricRepository->findById($id);
    }

    public function delete($id)
    {
        return $this->metricRepository->delete($id);
    }

}


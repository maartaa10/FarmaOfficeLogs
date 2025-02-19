<?php

namespace App\Http\Controllers;

use App\Services\MetricService;
use Illuminate\Http\Request;
use Exception;

class MetricController extends Controller
{
   /*  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
   */  protected $metricService;

    public function __construct(MetricService $metricService)
    {
        $this->metricService = $metricService;
    }

    public function store(Request $request)
    {
        // Validació de dades desde la Request
        $data = $request->validate([
            'product_id' => 'required|integer',
            'pharmacy_id' => 'required|integer',
            'old_price' => 'nullable|numeric',
            'new_price' => 'required|numeric',
            'old_stock' => 'nullable|integer',
            'new_stock' => 'required|integer',
            'source' => 'required|string|in:admin,system,API',
            'change_date' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        try {
         // Li enviem les dades al servei per emmagatzemar la mètrica
            $metric = $this->metricService->storeMetric($data);
            return response()->json($metric, 201);
        } catch (Exception $e) {
           
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
    public function findById($id)
    {
        try {
            $metric = $this->metricService->findById($id);

            if (!$metric) {
                return response()->json(['error' => 'Métrica no encontrada'], 404);
            }

            return response()->json($metric);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    //Eliminar una métrica
    public function destroy($id)
    {
        try {
            $deleted = $this->metricService->delete($id);

            if (!$deleted) {
                return response()->json(['error' => 'Métrica no encontrada o no pudo eliminarse'], 404);
            }

            return response()->json(['message' => 'Métrica eliminada correctamente']);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
   public function findAll()
    {
        return $this->metricService->findAll();
    }
}



















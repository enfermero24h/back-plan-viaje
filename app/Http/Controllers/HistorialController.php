<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Services\HistorialService;
use Illuminate\Http\JsonResponse;

class HistorialController extends Controller
{
    protected $historialService;

    public function __construct(HistorialService $historialService)
    {
        $this->historialService = $historialService;
    }

    public function indexAll(): JsonResponse
    {
        $historiales = $this->historialService->obtenerHistorial();
        return response()->json($historiales);
    }

    public function store(Request $request)
    {
        $historial = $this->historialService->crearHistorial($request->all());
        return response()->json($historial, 201);
    }
}
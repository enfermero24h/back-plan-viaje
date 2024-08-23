<?php

namespace App\Http\Controllers;

use App\Services\PresupuestoService;
use Illuminate\Http\Request;

class PresupuestoController extends Controller
{
    protected $presupuestoService;

    public function __construct(PresupuestoService $presupuestoService)
    {
        $this->presupuestoService = $presupuestoService;
    }

    public function index($historialId)
    {
        $presupuestos = $this->presupuestoService->obtenerPresupuestosPorHistorial($historialId);
        return response()->json($presupuestos);
    }

    public function show($id)
    {
        $presupuesto = $this->presupuestoService->obtenerPresupuestoPorId($id);
        return $presupuesto ? response()->json($presupuesto) : response()->json(['error' => 'Presupuesto no encontrado'], 404);
    }

    public function store(Request $request)
    {
        $presupuesto = $this->presupuestoService->crearPresupuesto($request->all());
        return response()->json($presupuesto, 201);
    }

    public function update(Request $request, $id)
    {
        $actualizado = $this->presupuestoService->actualizarPresupuesto($id, $request->all());
        return $actualizado ? response()->json(['success' => 'Presupuesto actualizado']) : response()->json(['error' => 'Presupuesto no encontrado'], 404);
    }

    public function destroy($id)
    {
        $eliminado = $this->presupuestoService->eliminarPresupuesto($id);
        return $eliminado ? response()->json(['success' => 'Presupuesto eliminado']) : response()->json(['error' => 'Presupuesto no encontrado'], 404);
    }
}

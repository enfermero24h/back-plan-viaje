<?php

namespace App\Http\Controllers;

use App\Services\PaisService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaisController extends Controller
{
    protected $paisService;

    public function __construct(PaisService $paisService)
    {
        $this->paisService = $paisService;
    }

    public function index()
    {
        try {
            $paises = $this->paisService->obtenerTodosLosPaises();
            return response()->json($paises);
        } catch (\Exception $e) {
            Log::error('Error obteniendo la lista de países: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener la lista de países'], 500);
        }
    }

    public function showPaisCiudades($id)
    {
        $pais = Pais::with('ciudades')->find($id);
        return $pais ? response()->json($pais->ciudades) : response()->json(['error' => 'Pais no encontrado'], 404);
    }

    public function show($id)
    {
        try {
            $pais = $this->paisService->obtenerPaisPorId($id);
            return $pais ? response()->json($pais) : response()->json(['error' => 'Pais no encontrado'], 404);
        } catch (\Exception $e) {
            Log::error('Error obteniendo el país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al obtener el país'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $pais = $this->paisService->crearPais($request->all());
            return response()->json($pais, 201);
        } catch (\Exception $e) {
            Log::error('Error creando el país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al crear el país'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $actualizado = $this->paisService->actualizarPais($id, $request->all());
            return $actualizado ? response()->json(['success' => 'Pais actualizado']) : response()->json(['error' => 'Pais no encontrado'], 404);
        } catch (\Exception $e) {
            Log::error('Error actualizando el país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al actualizar el país'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $eliminado = $this->paisService->eliminarPais($id);
            return $eliminado ? response()->json(['success' => 'Pais eliminado']) : response()->json(['error' => 'Pais no encontrado'], 404);
        } catch (\Exception $e) {
            Log::error('Error eliminando el país: ' . $e->getMessage());
            return response()->json(['error' => 'Error al eliminar el país'], 500);
        }
    }
}

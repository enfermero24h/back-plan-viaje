<?php

namespace App\Http\Controllers;

use App\Services\CiudadService;
use Illuminate\Http\Request;

class CiudadController extends Controller
{
    protected $ciudadService;

    public function __construct(CiudadService $ciudadService)
    {
        $this->ciudadService = $ciudadService;
    }

    public function indexAll()
    {
        $ciudades = $this->ciudadService->obtenerTodosLasCiudades();
        return response()->json($ciudades);
    }

    public function index($paisId)
    {
        $ciudades = $this->ciudadService->obtenerCiudadesPorPais($paisId);
        return response()->json($ciudades);
    }

    public function show($id)
    {
        $ciudad = $this->ciudadService->obtenerCiudadPorId($id);
        return $ciudad ? response()->json($ciudad) : response()->json(['error' => 'Ciudad no encontrada'], 404);
    }

    public function store(Request $request)
    {
        // Verifica si la solicitud contiene un array de ciudades
        if (isset($request[0])) {
            $ciudades = [];
            foreach ($request->all() as $ciudadData) {
                $ciudades[] = $this->ciudadService->crearCiudad($ciudadData);
            }
            return response()->json($ciudades, 201);
        } else {
            // Si no es un array, maneja una sola ciudad
            $ciudad = $this->ciudadService->crearCiudad($request->all());
            return response()->json($ciudad, 201);
        }
    }


    public function update(Request $request, $id)
    {
        $actualizado = $this->ciudadService->actualizarCiudad($id, $request->all());
        return $actualizado ? response()->json(['success' => 'Ciudad actualizada']) : response()->json(['error' => 'Ciudad no encontrada'], 404);
    }

    public function destroy($id)
    {
        $eliminado = $this->ciudadService->eliminarCiudad($id);
        return $eliminado ? response()->json(['success' => 'Ciudad eliminada']) : response()->json(['error' => 'Ciudad no encontrada'], 404);
    }
}

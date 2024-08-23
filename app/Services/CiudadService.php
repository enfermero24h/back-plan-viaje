<?php

namespace App\Services;

use App\Models\Ciudad;
use Illuminate\Database\Eloquent\Collection;

class CiudadService
{

    public function obtenerTodosLasCiudades(): Collection
    {
        try {
            return Ciudad::all();
        } catch (\Exception $e) {
            Log::error('Error obteniendo la lista de ciudad: ' . $e->getMessage());
            throw new \Exception('Error al obtener la lista de ciudad');
        }
    }
    public function obtenerCiudadesPorPais(int $paisId): Collection
    {
        return Ciudad::where('pais_id', $paisId)->get();
    }

    public function obtenerCiudadPorId(int $id): ?Ciudad
    {
        return Ciudad::find($id);
    }

    public function crearCiudad(array $data): Ciudad
    {
        return Ciudad::create($data);
    }

    public function crearCiudades(array $dataArray): array
    {
        $ciudades = [];
        foreach ($dataArray as $data) {
            $ciudades[] = $this->crearCiudad($data);
        }
        return $ciudades;
    }

    public function actualizarCiudad(int $id, array $data): bool
    {
        $ciudad = Ciudad::find($id);
        return $ciudad ? $ciudad->update($data) : false;
    }

    public function eliminarCiudad(int $id): bool
    {
        $ciudad = Ciudad::find($id);
        return $ciudad ? $ciudad->delete() : false;
    }
}

<?php

namespace App\Services;

use App\Models\Pais;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class PaisService
{
    public function obtenerTodosLosPaises(): Collection
    {
        try {
            return Pais::all();
        } catch (\Exception $e) {
            Log::error('Error obteniendo la lista de países: ' . $e->getMessage());
            throw new \Exception('Error al obtener la lista de países');
        }
    }

    public function obtenerPaisPorId(int $id): ?Pais
    {
        try {
            return Pais::find($id);
        } catch (\Exception $e) {
            Log::error('Error obteniendo el país: ' . $e->getMessage());
            throw new \Exception('Error al obtener el país');
        }
    }

    public function crearPais(array $data): Pais
    {
        try {
            return Pais::create($data);
        } catch (\Exception $e) {
            Log::error('Error creando el país: ' . $e->getMessage());
            throw new \Exception('Error al crear el país');
        }
    }

    public function actualizarPais(int $id, array $data): bool
    {
        try {
            $pais = Pais::find($id);
            return $pais ? $pais->update($data) : false;
        } catch (\Exception $e) {
            Log::error('Error actualizando el país: ' . $e->getMessage());
            throw new \Exception('Error al actualizar el país');
        }
    }

    public function eliminarPais(int $id): bool
    {
        try {
            $pais = Pais::find($id);
            return $pais ? $pais->delete() : false;
        } catch (\Exception $e) {
            Log::error('Error eliminando el país: ' . $e->getMessage());
            throw new \Exception('Error al eliminar el país');
        }
    }
}

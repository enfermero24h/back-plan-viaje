<?php

namespace App\Services;

use App\Models\Historial;
use Illuminate\Database\Eloquent\Collection;

class HistorialService
{
    public function obtenerHistorialPorCiudad(int $ciudadId): Collection
    {
        return Historial::where('ciudad_id', $ciudadId)->get();
    }

    public function obtenerHistorial(): Collection
    {
        return Historial::with(['ciudad.pais'])->orderBy('created_at', 'desc')->take(5)->get();
    }

    public function obtenerHistorialPorId(int $id): ?Historial
    {
        return Historial::find($id);
    }

    public function crearHistorial(array $data): Historial
    {
        return Historial::create($data);
    }

    public function actualizarHistorial(int $id, array $data): bool
    {
        $historial = Historial::find($id);
        return $historial ? $historial->update($data) : false;
    }

    public function eliminarHistorial(int $id): bool
    {
        $historial = Historial::find($id);
        return $historial ? $historial->delete() : false;
    }
}

<?php

namespace App\Services;

use App\Models\Presupuesto;
use Illuminate\Database\Eloquent\Collection;

class PresupuestoService
{
    public function obtenerPresupuestosPorHistorial(int $historialId): Collection
    {
        return Presupuesto::where('historial_id', $historialId)->get();
    }

    public function obtenerPresupuestoPorId(int $id): ?Presupuesto
    {
        return Presupuesto::find($id);
    }

    public function crearPresupuesto(array $data): Presupuesto
    {
        return Presupuesto::create($data);
    }

    public function actualizarPresupuesto(int $id, array $data): bool
    {
        $presupuesto = Presupuesto::find($id);
        return $presupuesto ? $presupuesto->update($data) : false;
    }

    public function eliminarPresupuesto(int $id): bool
    {
        $presupuesto = Presupuesto::find($id);
        return $presupuesto ? $presupuesto->delete() : false;
    }
}

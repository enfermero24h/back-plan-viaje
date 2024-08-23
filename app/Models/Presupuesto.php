<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Presupuesto extends Model
{
    protected $table = 'presupuestos';

    protected $fillable = [
        'historial_id',
        'presupuesto_cop',
        'presupuesto_convertido',
    ];

    public function historial()
    {
        return $this->belongsTo(Historial::class);
    }
}

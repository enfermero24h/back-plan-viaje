<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{

    protected $table = 'ciudades';

    protected $fillable = [
        'nombre',
        'pais_id',
        'moneda',
        'simbolo_moneda',
    ];

    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }

    public function historiales()
    {
        return $this->hasMany(Historial::class);
    }
}

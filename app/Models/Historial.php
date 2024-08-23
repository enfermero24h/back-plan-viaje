<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{

    protected $table = 'historial';

    protected $fillable = [
        'ciudad_id',
        'presupuesto_cop'
    ];

    public function ciudad()
    {
        return $this->belongsTo(Ciudad::class);
    }
}

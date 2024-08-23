<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ciudad;
use App\Models\Pais;

class CiudadSeeder extends Seeder
{
    public function run()
    {
        $ciudades = [
            ['nombre' => 'Lima', 'pais_id' => Pais::where('nombre', 'Perú')->first()->id, 'moneda' => 'Sol', 'simbolo_moneda' => 'S/'],
            ['nombre' => 'Cusco', 'pais_id' => Pais::where('nombre', 'Perú')->first()->id, 'moneda' => 'Sol', 'simbolo_moneda' => 'S/'],
            ['nombre' => 'Londres', 'pais_id' => Pais::where('nombre', 'Inglaterra')->first()->id, 'moneda' => 'Libra Esterlina', 'simbolo_moneda' => '£'],
            ['nombre' => 'Manchester', 'pais_id' => Pais::where('nombre', 'Inglaterra')->first()->id, 'moneda' => 'Libra Esterlina', 'simbolo_moneda' => '£'],
            ['nombre' => 'Tokio', 'pais_id' => Pais::where('nombre', 'Japón')->first()->id, 'moneda' => 'Yen', 'simbolo_moneda' => '¥'],
            ['nombre' => 'Osaka', 'pais_id' => Pais::where('nombre', 'Japón')->first()->id, 'moneda' => 'Yen', 'simbolo_moneda' => '¥'],
            ['nombre' => 'Delhi', 'pais_id' => Pais::where('nombre', 'India')->first()->id, 'moneda' => 'Rupia', 'simbolo_moneda' => '₹'],
            ['nombre' => 'Mumbai', 'pais_id' => Pais::where('nombre', 'India')->first()->id, 'moneda' => 'Rupia', 'simbolo_moneda' => '₹'],
        ];

        foreach ($ciudades as $ciudad) {
            Ciudad::create($ciudad);
        }
    }
}

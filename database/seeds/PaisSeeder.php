<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pais;

class PaisSeeder extends Seeder
{
    public function run()
    {
        $paises = [
            ['nombre' => 'Perú', 'codigo_iso' => 'PE'],
            ['nombre' => 'Inglaterra', 'codigo_iso' => 'GB'],
            ['nombre' => 'Japón', 'codigo_iso' => 'JP'],
            ['nombre' => 'India', 'codigo_iso' => 'IN'],
        ];

        foreach ($paises as $pais) {
            Pais::create($pais);
        }
    }
}

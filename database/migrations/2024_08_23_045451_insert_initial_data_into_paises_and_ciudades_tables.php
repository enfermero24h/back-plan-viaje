<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pais;
use App\Models\Ciudad;

class InsertInitialDataIntoPaisesAndCiudadesTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Insertar datos iniciales en la tabla de países, si no existen
        $paises = [
            ['nombre' => 'Perú', 'codigo_iso' => 'PE'],
            ['nombre' => 'Inglaterra', 'codigo_iso' => 'GB'],
            ['nombre' => 'Japón', 'codigo_iso' => 'JP'],
            ['nombre' => 'India', 'codigo_iso' => 'IN'],
        ];

        foreach ($paises as $pais) {
            Pais::firstOrCreate(['nombre' => $pais['nombre']], $pais);
        }

        // Insertar datos iniciales en la tabla de ciudades, si no existen
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
            Ciudad::firstOrCreate(
                ['nombre' => $ciudad['nombre'], 'pais_id' => $ciudad['pais_id']], 
                $ciudad
            );
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

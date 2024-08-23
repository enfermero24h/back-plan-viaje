<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pais;
use App\Models\Ciudad;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCrearCiudadFeature extends TestCase
{
    use RefreshDatabase;

    public function testCrearCiudad()
    {
        // Primero creamos un país para asociarlo a la ciudad
        $pais = Pais::create([
            'nombre' => 'Japón',
            'codigo_iso' => 'JP',
        ]);

        // Datos de prueba para la ciudad
        $data = [
            'nombre' => 'Tokio',
            'pais_id' => $pais->id,
            'moneda' => 'Yen',
            'simbolo_moneda' => '¥',
        ];

        // Realizamos la solicitud POST al endpoint de creación de ciudades
        $response = $this->postJson('/api/ciudades', $data);

        // Verificamos que la respuesta sea correcta (201: Created)
        $response->assertStatus(201);

        // Verificamos que la ciudad se haya guardado correctamente en la base de datos
        $this->assertDatabaseHas('ciudades', ['nombre' => 'Tokio', 'pais_id' => $pais->id]);
    }
}

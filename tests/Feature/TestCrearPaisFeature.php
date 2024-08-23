<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pais;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TestCrearPaisFeature extends TestCase
{
    use RefreshDatabase;

    public function testCrearPais()
    {
        // Datos de prueba
        $data = [
            'nombre' => 'Alemania',
            'codigo_iso' => 'DE',
        ];

        // Realizamos la solicitud POST al endpoint de creación de países
        $response = $this->postJson('/api/paises', $data);

        // Verificamos que la respuesta sea correcta (201: Created)
        $response->assertStatus(201);

        // Verificamos que el país se haya guardado correctamente en la base de datos
        $this->assertDatabaseHas('paises', ['nombre' => 'Alemania', 'codigo_iso' => 'DE']);
    }
}

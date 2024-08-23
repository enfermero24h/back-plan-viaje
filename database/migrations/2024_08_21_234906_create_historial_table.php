<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ciudad_id')->constrained('ciudades')->onDelete('cascade');
            $table->decimal('presupuesto_cop');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial');
    }
}
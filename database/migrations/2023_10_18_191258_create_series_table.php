<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->id();
            $table->string('titulo',150);
            $table->text('descripcion');
            $table->date('fecha_estreno');
            $table->integer('estrellas');
            $table->string('genero',100);
            $table->decimal('precio_alquiler',9,2);
            $table->boolean('ATP');
            $table->string('estado',3);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('series');
    }
}

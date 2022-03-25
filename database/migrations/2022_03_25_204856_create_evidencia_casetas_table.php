<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciaCasetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_casetas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('viaje_id')->constrained();
            $table->decimal('monto')->nullable();
            $table->string('lugar')->nullable();
            $table->string('observaciones')->nullable();
            $table->binary('foto')->nullable();
            $table->decimal('latitud',10,7)->nullable();
            $table->decimal('longitud',10,7)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evidencia_casetas');
    }
}

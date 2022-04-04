<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvidenciaCombustiblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_combustibles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('viaje_id')->constrained();
            $table->decimal('monto')->nullable();
            $table->decimal('litros')->nullable();
            $table->integer('km')->nullable();
            $table->integer('convenio')->nullable();
            $table->text('foto1_url')->nullable();
            $table->text('foto2_url')->nullable();
            $table->text('foto3_url')->nullable();
            $table->text('foto4_url')->nullable();
            $table->text('foto5_url')->nullable();
            $table->decimal('latitud',10,7)->nullable();
            $table->decimal('longitud',10,7)->nullable();
            $table->unsignedBigInteger('numero_interno');
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
        Schema::dropIfExists('evidencia_combustibles');
    }
}

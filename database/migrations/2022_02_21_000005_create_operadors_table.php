<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOperadorsTable extends Migration
{
    public function up()
    {
        Schema::create('operadors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('licencia')->nullable();
            $table->date('vence')->nullable();
            $table->string('tipo_licencia')->nullable();
            $table->string('imss')->nullable();
            $table->string('rfc')->nullable();
            $table->string('curp')->nullable();
            $table->string('tarjeta_bancaria')->nullable();
            $table->string('banco')->nullable();
            $table->string('usuario')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

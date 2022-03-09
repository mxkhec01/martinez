<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadsTable extends Migration
{
    public function up()
    {
        Schema::create('unidads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->nullable();
            $table->string('nombre')->nullable();
            $table->string('placas')->nullable();
            $table->string('tipo_unidad')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

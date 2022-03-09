<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('fecha_llegada')->nullable();
            $table->date('fecha_entrega')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

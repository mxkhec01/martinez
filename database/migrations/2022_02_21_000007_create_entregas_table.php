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
            $table->timestamp('fecha_llegada')->nullable();
            $table->timestamp('fecha_entrega')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

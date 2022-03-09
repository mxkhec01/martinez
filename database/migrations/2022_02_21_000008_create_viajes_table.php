<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViajesTable extends Migration
{
    public function up()
    {
        Schema::create('viajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre_viaje')->nullable();
            $table->string('estado');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToEntregasTable extends Migration
{
    public function up()
    {
        Schema::table('entregas', function (Blueprint $table) {
            $table->unsignedBigInteger('viaje_id')->nullable();
            $table->foreign('viaje_id', 'viaje_fk_5984587')->references('id')->on('viajes');
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id', 'cliente_fk_5983510')->references('id')->on('clientes');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToViajesTable extends Migration
{
    public function up()
    {
        Schema::table('viajes', function (Blueprint $table) {
            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->foreign('cliente_id', 'cliente_fk_5983523')->references('id')->on('clientes');
            $table->unsignedBigInteger('unidad_id')->nullable();
            $table->foreign('unidad_id', 'unidad_fk_5983524')->references('id')->on('unidads');
            $table->unsignedBigInteger('operador_id')->nullable();
            $table->foreign('operador_id', 'operador_fk_5983525')->references('id')->on('operadors');
        });
    }
}

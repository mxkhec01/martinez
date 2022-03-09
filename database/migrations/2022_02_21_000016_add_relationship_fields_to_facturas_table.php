<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToFacturasTable extends Migration
{
    public function up()
    {
        Schema::table('facturas', function (Blueprint $table) {
            $table->unsignedBigInteger('entrega_id')->nullable();
            $table->foreign('entrega_id', 'entrega_fk_5984747')->references('id')->on('entregas');
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToAnticiposViajesTable extends Migration
{
    public function up()
    {
        Schema::table('anticipos_viajes', function (Blueprint $table) {
            $table->unsignedBigInteger('viaje_id')->nullable();
            $table->foreign('viaje_id', 'viaje_fk_5983621')->references('id')->on('viajes');
        });
    }
}

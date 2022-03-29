<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnNumeroInternoToEvidenciaCasetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evidencia_casetas', function (Blueprint $table) {
            $table->unsignedBigInteger('numero_interno');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evidencia_casetas', function (Blueprint $table) {
            //
        });
    }
}

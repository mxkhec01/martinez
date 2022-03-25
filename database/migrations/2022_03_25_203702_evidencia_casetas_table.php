<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EvidenciaCasetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evidencia_caseta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto',)->nullable();
            $table->string('lugar')->nullable();
            $table->string('observaciones')->nullable();
            $table->binary('foto')->nullable();
            $table->decimal('latitud',10,7)->nullable();
            $table->decimal('longitud',10,7)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evidencia_caseta', function (Blueprint $table) {
            //
        });
    }
}

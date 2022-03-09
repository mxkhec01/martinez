<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnticiposViajesTable extends Migration
{
    public function up()
    {
        Schema::create('anticipos_viajes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('monto', 15, 2)->nullable();
            $table->string('descripcion')->nullable();
            $table->date('fecha')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proveedor', function (Blueprint $table) {
            $table->string('Idproveedor',15);             
            $table->string('Nombreprove',50);
            $table->string('Direccionprove',50);
            $table->string('Correoprove',50); 
            $table->string('Telefonoprove',15);
            $table->unsignedBigInteger('estadoprov');
            $table->foreign('estadoprov')->references('idestado')->on('estado');
            $table->primary('Idproveedor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proveedor');
    }
}

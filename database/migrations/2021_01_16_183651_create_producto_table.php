<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::create('producto', function (Blueprint $table) {
            $table->string('Idproducto',15);
            $table->unsignedBigInteger('Idcat');              
            $table->string('Nombrepro',50);
            $table->string('Descripcionpro');
            $table->unsignedBigInteger('Marcapro'); 
            $table->integer('Cantidadpro');
            $table->float('Preciopro');  
            $table->string('fotopro',50);
            $table->unsignedBigInteger('estadopro');

            $table->primary('Idproducto');

            $table->foreign('Idcat')->references('Idcategoria')->on('categoria');
            $table->foreign('Marcapro')->references('idmarca')->on('marca');
            $table->foreign('estadopro')->references('idestado')->on('estado');
            

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
        Schema::dropIfExists('producto');
    }
}

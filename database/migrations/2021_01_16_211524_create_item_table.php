<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
             
            $table->string('Idpro',15); 
            $table->unsignedBigInteger('Idfac'); 
            $table->integer('Numeroitem');                    
            $table->integer('Cantidaditem');
            $table->float('Precioitem'); 
            $table->float('Totalitem'); 

            $table->foreign('Idpro')->references('Idproducto')->on('producto');
            $table->foreign('Idfac')->references('Idfactura')->on('factura');

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
        Schema::dropIfExists('item');
    }
}

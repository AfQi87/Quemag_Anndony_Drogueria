<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemFacturaVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_factura_venta', function (Blueprint $table) {
            $table->unsignedBigInteger('Idfacven'); 
            $table->string('Idpro',15); 
                                
            $table->integer('Cantidaditem');
            $table->float('Precioitem'); 
            $table->float('Totalitem'); 



            $table->foreign('Idpro')->references('Idproducto')->on('producto');
            $table->foreign('Idfacven')->references('Idfacven')->on('factura_venta');
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
        Schema::dropIfExists('item_factura_venta');
    }
}

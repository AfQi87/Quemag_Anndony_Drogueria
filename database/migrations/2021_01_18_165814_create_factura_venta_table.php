<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura_venta', function (Blueprint $table) {

            $table->bigIncrements('Idfacven'); 
            $table->string('Idpersona',15); 
            $table->date('Fechafacven');                    
            $table->float('Totalfacven'); 
            $table->unsignedBigInteger('estadofacv');

            $table->foreign('Idpersona')->references('id')->on('users');
            $table->foreign('estadofacv')->references('idestado')->on('estado');

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
        Schema::dropIfExists('factura_venta');
    }
}

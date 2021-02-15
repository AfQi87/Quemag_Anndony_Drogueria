<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factura', function (Blueprint $table) {

            $table->bigIncrements('Idfactura'); 
            $table->string('Idprove',15); 
            $table->date('Fechafac');                    
            $table->float('Totalfac'); 
            $table->unsignedBigInteger('estadofac');
            
            
            
            $table->foreign('Idprove')->references('Idproveedor')->on('proveedor');
            $table->foreign('estadofac')->references('idestado')->on('estado');
            
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
        Schema::dropIfExists('factura');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->string('id',15);
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedBigInteger('tipopro');
            $table->unsignedBigInteger('estadoUser');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->primary('id');
            
            
            
            $table->foreign('tipopro')->references('idtipo')->on('tipo');
            $table->foreign('estadoUser')->references('idestado')->on('estado');
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
        Schema::dropIfExists('users');
    }
}

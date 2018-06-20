<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFreelancerProyectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('freelancer_proyect', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('freelancer_id')->unsigned();
            $table->foreign('freelancer_id')->references('id')->on('freelancers');

            $table->integer('proyect_id')->unsigned();            
            $table->foreign('proyect_id')->references('id')->on('proyects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('freelancer_proyect');
    }
}

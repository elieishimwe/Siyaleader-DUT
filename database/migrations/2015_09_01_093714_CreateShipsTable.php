<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('ships',function($table){
            $table->increments('id');
            $table->string('shipName');
            $table->string('shipDescription');
            $table->string('shipGPS');
            $table->decimal('shipHeading');
            $table->string('shipImg_url');
            $table->boolean('active')->default(1);
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
        Schema::drop('ships');
    }
}

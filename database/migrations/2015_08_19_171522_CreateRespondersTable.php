<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespondersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responders',function($table){
            $table->increments('id');
            $table->integer('department');
            $table->integer('category');
            $table->integer('sub_category');
            $table->integer('sub_sub_category');
            $table->integer('firstResponder');
            $table->integer('secondResponder');
            $table->integer('thirdResponder');
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
        Schema::drop('responders');
    }
}

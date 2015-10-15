<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cases',function($table){
            $table->increments('id');
            $table->string('description');
            $table->integer('user');
            $table->integer('department');
            $table->integer('category');
            $table->integer('sub_category');
            $table->integer('sub_sub_category');
            $table->string('priority');
            $table->string('status');
            $table->string('gps_lat');
            $table->string('gps_lng');
            $table->string('img_url');
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
         Schema::drop('cases');
    }
}

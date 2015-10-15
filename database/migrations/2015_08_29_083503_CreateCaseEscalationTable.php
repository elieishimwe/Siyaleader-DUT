<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaseEscalationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caseEscalations',function($table){
            $table->increments('id');
            $table->integer('caseId');
            $table->integer('from');
            $table->integer('to');
            $table->integer('type');
            $table->string('message');
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
        Schema::drop('caseEscalations');
    }
}

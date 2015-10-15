<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsMessageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function($table)
        {

            $table->integer('online');
            $table->integer('caseId');
            $table->integer('read');
            $table->string('subject');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function($table)
        {

            $table->dropColumn('online');
            $table->dropColumn('caseId');
            $table->dropColumn('read');
            $table->dropColumn('subject');

        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cases', function($table)
        {

            $table->integer('addressbook');
            $table->integer('precinct');
            $table->integer('reporter');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cases', function($table)
        {

            $table->dropColumn('addressbook');
            $table->dropColumn('precinct');
            $table->dropColumn('reporter');


        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsCaseFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('caseFiles', function($table) {

            $table->string('fileNote');
            $table->string('imgUrl');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('caseFiles', function($table)
        {

            $table->dropColumn('fileNote');
            $table->dropColumn('imgUrl');


        });
    }
}

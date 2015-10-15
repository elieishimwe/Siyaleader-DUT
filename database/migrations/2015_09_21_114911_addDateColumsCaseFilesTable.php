<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDateColumsCaseFilesTable extends Migration
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
            $table->dateTime('accepted_at');
            $table->dateTime('referred_at');
            $table->dateTime('escalated_at');
            $table->dateTime('resolved_at');
            $table->dateTime('closed_at');

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

            $table->dropColumn('accepted_at');
            $table->dropColumn('referred_at');
            $table->dropColumn('escalated_at');
            $table->dropColumn('resolved_at');
            $table->dropColumn('closed_at');

        });
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table)
        {

            $table->integer('availability');
            $table->datetime('last_login');
            $table->datetime('last_logout');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table)
        {

            $table->dropColumn('last_login');
            $table->dropColumn('last_logout');
            $table->dropColumn('availability');

        });

    }
}

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

            $table->string('surname');
            $table->string('title');
            $table->integer('position');
            $table->integer('role');
            $table->string('cellphone')->unique();
            $table->integer('department');
            $table->string('username');
            $table->integer('province');
            $table->integer('district');
            $table->integer('municipality');
            $table->integer('status');
            $table->string('api_key');

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

            $table->dropColumn('surname');
            $table->dropColumn('title');
            $table->dropColumn('position');
            $table->dropColumn('role');
            $table->dropColumn('cellphone');
            $table->dropColumn('department');
            $table->dropColumn('username');
            $table->dropColumn('district');
            $table->dropColumn('municipality');
            $table->dropColumn('status');
            $table->dropColumn('province');
            $table->dropColumn('api_key');


        });
    }
}

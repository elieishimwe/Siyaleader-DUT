<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('cellphone')->unique();
            $table->string('title');
            $table->integer('position');
            $table->integer('role');
            $table->integer('language');
            $table->integer('id_number');
            $table->integer('department');
            $table->string('username');
            $table->integer('province');
            $table->integer('district');
            $table->integer('ward');
            $table->integer('municipality');
            $table->string('img_url');
            $table->string('api_key');
            $table->string('password');
            $table->integer('availability');
            $table->datetime('last_login');
            $table->datetime('last_logout');
            $table->boolean('active')->default(1);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

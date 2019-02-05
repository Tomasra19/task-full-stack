<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('username');
            $table->string('email')->unique();
            $table->string('street');
            $table->string('suite')->nullable();
            $table->string('city');
            $table->string('zipcode');
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('phone');
            $table->string('website')->nullable();
            $table->string('cName');
            $table->text('catchPhrase')->nullable();
            $table->text('bs')->nullable();
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
        Schema::dropIfExists('users');
    }
}

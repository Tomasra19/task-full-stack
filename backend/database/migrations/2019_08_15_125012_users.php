<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
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
        $table->string('email');
        $table->string('street');
        $table->string('suite');
        $table->string('city');
        $table->string('zipcode');
        $table->double('lat');
        $table->double('lng');
        $table->double('phone');
        $table->string('website');
        $table->string('company_name');
        $table->string('catchPhrase');
        $table->string('company_bs');
        
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
        //
    }
}

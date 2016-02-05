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
        Schema::create('User', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('username');
            $table->string('password');
            $table->string('email');
            $table->string('facebookId');
            $table->boolean('isTlgTownshipExit');
            $table->boolean('isTestAcc');
            $table->string('phoneNo');
            $table->string('profileimage');
            $table->string('searchName');
            $table->string('tlg_city_address');
            $table->string('user_profile_img');
            $table->string('updatedAt');
            $table->string('registerBODname');
            $table->string('userImgPath');
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
        Schema::drop('User');
    }
}

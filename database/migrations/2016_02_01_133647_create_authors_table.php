<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Author', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('authorImg');
            $table->string('authorInfoEng');
            $table->string('authorInfoMM');
            $table->string('authorName');
            $table->string('authorTitleEng');
            $table->string('authorTitleMM');
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
        Schema::drop('Author');
    }
}

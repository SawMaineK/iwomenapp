<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Comment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('comment_contents');
            $table->string('comment_created_time');
            $table->string('postId');
            $table->string('sticker_img_path');
            $table->string('userId');
            $table->string('user_img_path');
            $table->string('user_name');
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
        Schema::drop('Comment');
    }
}

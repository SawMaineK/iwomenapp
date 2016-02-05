<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Post', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('content');
            $table->string('contentType');
            $table->string('content_mm');
            $table->string('image');
            $table->integer('likes');
            $table->string('postUploadName');
            $table->string('postUploadPersonImg');
            $table->string('postUploadedDate');
            $table->string('suggest_section');
            $table->string('suggest_section_eng');
            $table->string('title');
            $table->string('titleMm');
            $table->string('userId');
            $table->string('userRelation');
            $table->string('videoId');
            $table->string('audioFile');
            $table->integer('comment_count');
            $table->boolean('isAllow');
            $table->string('postUploadUserImgPath');
            $table->integer('share_count');
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
        Schema::drop('Post');
    }
}

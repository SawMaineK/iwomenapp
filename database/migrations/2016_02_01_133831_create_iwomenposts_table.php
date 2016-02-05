<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIwomenpostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('IwomenPost', function (Blueprint $table) {
            $table->increments('id');
            $table->string('objectId');
            $table->string('audioFile');
            $table->string('authorId');
            $table->integer('comment_count');
            $table->string('content');
            $table->string('contentType');
            $table->string('content_mm');
            $table->string('credit_link');
            $table->string('credit_link_mm');
            $table->string('credit_logo_url');
            $table->string('credit_name');
            $table->string('image');
            $table->boolean('isAllow');
            $table->integer('likes');
            $table->string('postUploadName');
            $table->string('postUploadPersonImg');
            $table->string('postUploadUserImgPath');
            $table->string('postUploadedDate');
            $table->string('post_author_role');
            $table->string('post_author_role_mm');
            $table->integer('share_count');
            $table->string('suggest_section_eng');
            $table->string('title');
            $table->string('titleMm');
            $table->string('userId');
            $table->string('videoId');
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
        Schema::drop('IwomenPost');
    }
}

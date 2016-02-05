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
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->text('content');
			$table->string('contentType');
			$table->text('content_mm');
			$table->string('image');
			$table->integer('likes');
			$table->string('postUploadName');
			$table->string('postUploadPersonImg');
			$table->timestamp('postUploadedDate');
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
			$table->string('category_id');
			$table->timestamps();
			$table->softDeletes();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}

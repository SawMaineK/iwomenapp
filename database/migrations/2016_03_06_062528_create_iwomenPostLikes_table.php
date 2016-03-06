<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIwomenPostLikesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iwomenPostLikes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->integer('postId');
			$table->integer('userId');
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
		Schema::drop('iwomenPostLikes');
	}

}

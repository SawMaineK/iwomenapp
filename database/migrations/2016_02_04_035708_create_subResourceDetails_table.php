<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubResourceDetailsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('subResourceDetails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->string('author_img_path');
			$table->boolean('isAllow');
			$table->string('resource_author_id');
			$table->string('resource_author_name');
			$table->string('resource_icon_img');
			$table->string('resource_title_eng');
			$table->string('resource_title_mm');
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
		Schema::drop('subResourceDetails');
	}

}

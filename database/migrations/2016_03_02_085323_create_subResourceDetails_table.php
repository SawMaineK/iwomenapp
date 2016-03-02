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
			$table->string('authorName');
			$table->string('author_id');
			$table->string('author_img_url');
			$table->boolean('isAllow');
			$table->string('objectId');
			$table->timestamp('posted_date');
			$table->string('resource_id');
			$table->string('sub_res_icon_img_url');
			$table->text('sub_resouce_content_eng');
			$table->text('sub_resouce_content_mm');
			$table->text('sub_resource_title_eng');
			$table->text('sub_resource_title_mm');
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

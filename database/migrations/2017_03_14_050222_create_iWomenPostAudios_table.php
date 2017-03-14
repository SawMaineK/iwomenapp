<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIWomenPostAudiosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('iWomenPostAudios', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('post_id');
			$table->string('name');
			$table->string('name_mm');
			$table->string('links_path');
			$table->string('uploaded_date');
			$table->boolean('isAllow');
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
		Schema::drop('iWomenPostAudios');
	}

}

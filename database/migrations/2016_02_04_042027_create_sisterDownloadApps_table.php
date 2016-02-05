<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSisterDownloadAppsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sisterDownloadApps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->string('app_img');
			$table->string('app_link');
			$table->string('app_name');
			$table->string('app_package_name');
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
		Schema::drop('sisterDownloadApps');
	}

}

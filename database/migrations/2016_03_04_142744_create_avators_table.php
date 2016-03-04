<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvatorsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('avators', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->string('avatorImg');
			$table->string('avatorImgPath');
			$table->string('avatorName');
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
		Schema::drop('avators');
	}

}

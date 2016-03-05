<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalendarsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('calendars', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('objectId');
			$table->integer('userId');
			$table->string('title');
			$table->string('title_mm');
			$table->text('description');
			$table->text('description_mm');
			$table->string('location');
			$table->string('location_mm');
			$table->timestamp('start_date');
			$table->timestamp('end_date');
			$table->string('start_time');
			$table->string('end_time');
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
		Schema::drop('calendars');
	}

}

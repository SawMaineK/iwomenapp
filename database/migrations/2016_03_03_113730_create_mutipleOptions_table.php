<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutipleOptionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mutipleOptions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('mutiple_question_id');
			$table->text('option');
			$table->text('option_mm');
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
		Schema::drop('mutipleOptions');
	}

}

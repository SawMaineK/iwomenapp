<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMutipleQuestionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mutipleQuestions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('question_id');
			$table->string('type');
			$table->text('question');
			$table->text('question_mm');
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
		Schema::drop('mutipleQuestions');
	}

}

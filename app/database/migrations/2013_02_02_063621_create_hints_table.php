<?php

use Illuminate\Database\Migrations\Migration;

class CreateHintsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hints', function($table)
		{
			$table->increments('id');

			$table->integer('assignment_id');
			$table->integer('teacher_id');
			$table->integer('question_id');
			$table->text('text');
			$table->text('data')->nullable();

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hints');
	}

}
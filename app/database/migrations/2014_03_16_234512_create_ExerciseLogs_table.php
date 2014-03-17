<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExerciseLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('exercise_logs', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('exercise_id')->unsigned();
			$table->integer('workout_id')->unsigned();
			$table->integer('sets');
			$table->integer('reps');
			$table->integer('weight');
			$table->timestamps();
			$table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade'); // assumes an exercise table
			$table->foreign('workout_id')->references('id')->on('workouts')->onDelete('cascade'); // assumes a workouts table
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('exercise_logs', function(Blueprint $table) {
			$table->dropForeign('exercise_logs_exercise_id_foreign');
		});

		Schema::table('exercise_logs', function(Blueprint $table) {
			$table->dropForeign('exercise_logs_workout_id_foreign');
		});

	    Schema::drop('exercise_logs');
	}

}

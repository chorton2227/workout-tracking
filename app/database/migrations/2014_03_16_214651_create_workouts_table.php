<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkoutsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('workouts', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('routine_id')->unsigned();
			$table->date('workout_date');
			$table->timestamps();
			$table->foreign('routine_id')->references('id')->on('routines')->onDelete('cascade'); // assumes a routines table
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('workouts', function(Blueprint $table) {
			$table->dropForeign('workouts_routine_id_foreign');
		});

	    Schema::drop('workouts');
	}

}

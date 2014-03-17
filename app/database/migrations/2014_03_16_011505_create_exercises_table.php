<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExercisesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('exercises', function($table)
        {
            $table->increments('id');
			$table->integer('routine_id')->unsigned();
			$table->string('name');
			$table->text('description');
			$table->text('notes');
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
		Schema::table('exercises', function(Blueprint $table) {
			$table->dropForeign('exercises_routine_id_foreign');
		});

	    Schema::drop('exercises');
	}

}

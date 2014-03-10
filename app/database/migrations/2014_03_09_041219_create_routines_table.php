<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoutinesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('routines', function($table)
        {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('name');
			$table->timestamps();
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // assumes a users table
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('routines', function(Blueprint $table) {
			$table->dropForeign('routines_user_id_foreign');
		});

	    Schema::drop('routines');
	}

}

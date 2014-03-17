<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeightLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('weight_logs', function(Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->decimal('weight', 3, 1);
			$table->date('weigh_date');
			$table->text('notes');
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
		Schema::table('weight_logs', function(Blueprint $table) {
			$table->dropForeign('weight_logs_user_id_foreign');
		});
		
	    Schema::drop('weight_logs');
	}

}

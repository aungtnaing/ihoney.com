<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('villages', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('villagetractid');
			$table->string('name');
			$table->string('mname');
			$table->float('latitude');
			$table->float('longitude');
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
		Schema::drop('villages');
	}

}

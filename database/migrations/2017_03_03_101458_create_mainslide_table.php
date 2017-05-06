<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainslideTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mainslide', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('title');
			$table->string('special');
			$table->string('photourl1');
			$table->string('photourl2');
			$table->string('photourl3');
			$table->string('description',1000);
			$table->string('fburl');
			$table->string('wwwurl');
			$table->string('email');
			$table->string('address');
			$table->string('ph1');
			$table->string('ph2');
			$table->boolean('active');
			$table->integer('slideno');

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
		Schema::drop('mainslide');
	}

}

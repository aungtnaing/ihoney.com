<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOurshopsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ourshops', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('mname');
			$table->string('address');
			$table->string('ph1');
			$table->string('ph2');
			$table->string('wwwlink');
			$table->string('fblink');
			
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
		Schema::drop('ourshops');
	}

}

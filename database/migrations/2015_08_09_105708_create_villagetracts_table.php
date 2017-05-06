<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagetractsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('villagetracts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('townshipid');
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
		Schema::drop('villagetracts');
	}

}

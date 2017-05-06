<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('mname');
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->string('photourl');
			$table->integer('mediaid');
			$table->string('about');
			$table->string('fburl');	
			$table->string('ph1');
			$table->string('ph2');
			$table->string('address');
			$table->integer('roleid');

			$table->rememberToken();
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
		Schema::drop('users');
	}

}

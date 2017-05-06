<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBgphotoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bgphoto', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('logo');
			$table->string('newarrivels');
			$table->string('collections');
			$table->string('lovelys');
			$table->string('specialselection');
			$table->string('newcollection');
			$table->string('businesspartner');
			$table->string('footer');
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
		Schema::drop('bgphoto');
	}

}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('category', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('maincategoryid')->unsigned();
			$table->string('name');
			$table->string('mname');
			$table->timestamps();
		});

		Schema::table('category', function (Blueprint $table) {
			$table->foreign('maincategoryid')->references('id')->on('maincategory')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('category');
	}

}

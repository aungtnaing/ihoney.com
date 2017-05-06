<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductdetailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('productdetails', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('productid');
	    	$table->string('sizes');
	    	$table->string('sizeno');
	    	$table->string('productdetailcode');
i
	    	$table->string('description');
	    	$table->boolean('active');
			$table->string('photourl1');
					
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
		Schema::drop('productdetails');
	}

}

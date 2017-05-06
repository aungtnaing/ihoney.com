<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('mname');
			$table->integer('productcode');
			$table->integer('categoryid');
			$table->integer('brandid');
			$table->integer('collectionid');
			$table->integer('ourshopid');
			$table->integer('mprice');
			$table->integer('tprice');
			$table->integer('sprice');
			$table->integer('iprice');
			$table->string('description',1000);
			$table->timestamps();
		});

		Schema::table('products', function ($table) 
		{
	    	$table->integer('omprice');
	    	$table->integer('otprice');
	    	$table->integer('osprice');
	    	$table->integer('oiprice');
			$table->boolean('new');
			$table->boolean('active');
			$table->tinyInteger('discount');
			$table->string('photourl1');
			$table->string('photourl2');
			$table->string('photourl3');
			$table->string('photourl4');
			$table->string('photourl5');
			$table->boolean('specialselection');
			$table->boolean('bestseller');
			$table->boolean('lovely');

			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}

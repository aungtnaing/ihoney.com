<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('shippings', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('mname');
			$table->string('address');
			$table->string('ph1');
			$table->string('ph2');
			$table->string('remark');
			
			$table->integer('invoiceid');
			$table->integer('invoiceno');
			$table->date('shippingdate');
			
			$table->integer('total');
			$table->integer('deliverycharge');

			
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
		Schema::drop('shippings');
	}

}

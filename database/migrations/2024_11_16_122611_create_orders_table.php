<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('client_id')->unsigned();
			$table->string('notes');
			$table->decimal('total_price', 8,2);
			$table->decimal('delivery_price', 8,2);
			$table->integer('subtotal');
			$table->enum('status', array('Prepare', 'delivery'));
			$table->string('address');
			$table->enum('payment', array('visa', 'cash'));
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}
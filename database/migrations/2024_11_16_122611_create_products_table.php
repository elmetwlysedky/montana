<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('image');
			$table->decimal('price', 8,2);
			$table->string('price_of_sale', 8,2)->nullable();
			$table->integer('quantity');
			$table->longText('description')->nullable();
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}
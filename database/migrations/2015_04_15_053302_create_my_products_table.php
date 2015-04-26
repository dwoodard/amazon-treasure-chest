<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMyProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('my_products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('product_id');
			$table->integer('user_id')->nullable();
			$table->string('recommended_stock');
			$table->string('our_cost')->nullable();
			$table->string('prep_fees')->nullable();
			$table->string('shipping_cost')->nullable();
			$table->timestamp('first_order_date')->nullable();
			$table->timestamp('amazon_received_order_date')->nullable();
			$table->timestamp('next_order_date')->nullable();
			$table->timestamp('last_order_date')->nullable();
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
		Schema::drop('my_products');
	}

}

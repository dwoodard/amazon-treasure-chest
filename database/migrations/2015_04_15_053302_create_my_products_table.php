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
			$table->string('recommended_stock');
			$table->string('our_cost');
			$table->string('prep_fees');
			$table->string('shipping_cost');
			$table->string('profit_margin');
			$table->timestamp('shipping_and_handling_duration');
			$table->timestamp('next_order_date');
			$table->integer('user_id');
			$table->string('made_by_me');
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

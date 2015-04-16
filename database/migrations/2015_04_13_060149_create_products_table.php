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
			$table->string('title')->nullable();
			$table->string('asin')->unique()->nullable();;
			$table->string('price')->nullable();
			$table->string('manufacturer')->nullable();
			$table->string('made_by_link')->nullable();
			$table->string('stars')->nullable();
			$table->string('fba_sellers_total')->nullable();
			$table->string('price_lowest_sold')->nullable();
			$table->string('url');
			$table->string('customer_reviews_total')->nullable();
			$table->string('sold_by')->nullable();
			$table->string('new_sellers_total')->nullable();
			$table->string('new_sellers_link')->nullable();
			$table->string('item_model_number')->nullable();
			$table->string('manufacturer_part_number')->nullable();
			$table->string('dimensions')->nullable();
			$table->string('weight')->nullable();
			$table->string('category')->nullable();
			$table->string('category_rank')->nullable();
			$table->string('subcategory')->nullable();
			$table->enum('type', ['none', 'possible', 'filler', 'selected', 'rejected'])->nullable();
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
		Schema::drop('products');
	}

}

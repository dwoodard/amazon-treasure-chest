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
			$table->string('product_productTitle');
			$table->string('product_price');
			$table->string('product_madeBy');
			$table->string('product_madeByLink');
			$table->string('customers_totalCustomerReviews');
			$table->string('merchantInfo_hasMerchantInfo');
			$table->string('merchantInfo_newSellers_total');
			$table->string('merchantInfo_newSellers_link');
			$table->string('merchantInfo_newSellers_lowestSellingPrice');
			$table->string('merchantInfo_soldBy');
			$table->string('merchantInfo_soldBySeller');
			$table->string('merchantInfo_isFBA');
			$table->string('merchantInfo_fulfilledBy');
			$table->string('merchantInfo_SellerFBACount');
			$table->string('product_details_dimensions');
			$table->string('product_details_shippingWeight');
			$table->string('product_details_ASIN');
			$table->string('product_details_ItemModelNumber');
			$table->string('product_details_manufacturerPartNumber');
			$table->string('product_details_category_rank');
			$table->string('product_details_category_category');
			$table->string('product_details_subcategory_category');
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

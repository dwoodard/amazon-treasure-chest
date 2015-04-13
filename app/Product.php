<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

	protected $table = 'products';
	protected $fillable = array(
		'product_productTitle',
		'product_price',
		'product_madeBy',
		'product_madeByLink',
		'customers_totalCustomerReviews',
		'merchantInfo_hasMerchantInfo',
		'merchantInfo_newSellers_total',
		'merchantInfo_newSellers_link',
		'merchantInfo_newSellers_lowestSellingPrice',
		'merchantInfo_usedSellers_total',
		'merchantInfo_usedSellers_lowestSellingPrice',
		'merchantInfo_soldBy',
		'merchantInfo_soldBySeller',
		'merchantInfo_fulfilledBy',
		'merchantInfo_isFBA',
		'merchantInfo_SellerFBACount',
		'product_details_dimensions',
		'product_details_shippingWeight',
		'product_details_ASIN',
		'product_details_ItemModelNumber',
		'product_details_manufacturerPartNumber',
		'product_details_category_rank',
		'product_details_category_category',
		'product_details_subcategory_category',
    );

}

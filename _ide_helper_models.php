<?php
/**
 * An helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Product
 *
 * @property integer $id 
 * @property string $title 
 * @property string $asin 
 * @property string $price 
 * @property string $manufacturer 
 * @property string $made_by_link 
 * @property string $stars 
 * @property string $fba_sellers_total 
 * @property string $price_lowest_sold 
 * @property string $url 
 * @property string $customer_reviews_total 
 * @property string $sold_by 
 * @property string $new_sellers_total 
 * @property string $new_sellers_link 
 * @property string $item_model_number 
 * @property string $manufacturer_part_number 
 * @property string $dimensions 
 * @property string $weight 
 * @property string $category 
 * @property string $category_rank 
 * @property string $subcategory 
 * @property string $status 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereAsin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereManufacturer($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereMadeByLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereStars($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereFbaSellersTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product wherePriceLowestSold($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCustomerReviewsTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereSoldBy($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereNewSellersTotal($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereNewSellersLink($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereItemModelNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereManufacturerPartNumber($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereDimensions($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereWeight($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCategoryRank($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereSubcategory($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereStatus($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Product whereUpdatedAt($value)
 */
	class Product {}
}

namespace App{
/**
 * App\User
 *
 * @property integer $id 
 * @property string $name 
 * @property string $email 
 * @property string $password 
 * @property string $remember_token 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
 */
	class User {}
}


<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'products';

    protected $fillable = array(
        'title',
        'asin',
        'price',
        'manufacturer',
        'made_by_link',
        'stars',
        'fba_sellers_total',
        'price_lowest_sold',
        'url',
        'customer_reviews_total',
        'sold_by',
        'new_sellers_total',
        'new_sellers_link',
        'item_model_number',
        'manufacturer_part_number',
        'dimensions',
        'weight',
        'category',
        'category_rank',
        'subcategory',
        'status',
    );

    public function my_product()
    {
        return $this->hasOne('App\MyProduct', 'id');
    }


}

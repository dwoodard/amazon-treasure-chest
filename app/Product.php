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
        'img',
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
        'notes',
//        'manufacturer_id',
    );

    public function scopeNotMyProducts($query)
    {
        $my_products = MyProduct::all()->lists('product_id');
        return $query->whereNotIn('id',$my_products);
    }

    public function scopeIsNotRejected($query)
    {
        return $query->where('status',  '!=',  "rejected")->orWhereNull('status');
    }

    public function scopeNotAmazonFromTracker($query)
    {
        //AND asin NOT IN
        //(SELECT asin FROM `tracker` where sellerID = 'amazon' Group by asin)

        $tracker = Tracker::where('sellerId', '=', 'amazon')->groupBy('asin')->lists('asin');
        return $query->whereNotIn('asin',$tracker);
    }


    public function scopeIsSoldByAmazon($query)
    {
        return $query->where('products.sold_by',  'NOT LIKE',  "%sold by Amazon.com%");
    }

    public function scopeIsNotSoldByAmazon($query)
    {
        return $query->where('products.sold_by',  'LIKE',  "%sold by Amazon.com%");
    }

    public function my_product()
    {
        return $this->hasOne('App\MyProduct', 'id');
    }
    public function tracker()
    {
        return $this->hasMany('App\Tracker','asin', 'asin');
    }

    public function manufacturer()
    {
        return $this->belongsTo('App\Manufacturer');
    }

    public function history(){
        return $this->morphMany('App\History', 'historable');
    }


}

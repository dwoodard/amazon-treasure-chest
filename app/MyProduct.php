<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MyProduct extends Model
{

    protected $table = 'my_products';

    protected $fillable = array(
        'product_id',
        'user_id',
        'recommended_stock',
        'our_cost',
        'prep_fees',
        'shipping_cost',
        'first_order_date',
        'amazon_received_order_date',
        'next_order_date',
        'last_order_date',
    );

    public function product()
    {
        return $this->hasOne('App\Product','id', 'product_id');
    }

    public function tracker()
    {
        return $this->hasMany('App\Tracker','asin', 'asin');
    }


}

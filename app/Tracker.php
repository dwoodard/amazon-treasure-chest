<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tracker extends Model
{

//    use SoftDeletes;
//    protected $dates = ['deleted_at'];

    protected $table = 'tracker';

    protected $fillable = array(
        'ip',
        'region',
        'asin',
        'price',
        'sellerId',
        'stock',
    );

}

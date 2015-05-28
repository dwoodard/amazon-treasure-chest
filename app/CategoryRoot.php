<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryRoot extends Model
{

    protected $table = 'category_root';

    protected $fillable = array(
        "name",
        "total",
        "approval",
    );

}

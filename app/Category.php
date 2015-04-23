<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	protected $table = 'categories';

    protected $fillable = array(
		"category_name",
		"total",
		"category_parent",
    );

}

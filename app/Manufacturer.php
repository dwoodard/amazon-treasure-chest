<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table = 'manufacturers';
    protected $fillable = array(
        "id",
        "company",
        "contact_person",
        "contact_url",
        "wholesale_link",
        "email",
        "phone",
        "address",
        "homepage",
        "status",
        "no_amazon",
        "notes",
    );

    public function product()
    {
        return $this->hasMany('App\Product');
    }

}

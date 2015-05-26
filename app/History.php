<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model {

	protected $table = "history";
    protected $guarded = array('id');

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function historable(){
        return $this->morphTo();
    }

}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model {

	//
	protected $table = 'collections';
	// protected $fillable = ["id","name","mname","maincategoryid"];

	 public function products()
    {
        return $this->hasMany('App\Products', 'collectionid');
    }

}

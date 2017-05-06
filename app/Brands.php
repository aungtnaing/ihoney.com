<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Brands extends Model {

	//
	protected $table = 'brands';
	
	public function products()
    {
        return $this->hasMany('App\Products', 'brandid');
    }

}

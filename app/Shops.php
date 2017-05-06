<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Shops extends Model {

	//
	protected $table = 'ourshops';
	// protected $fillable = ["id","name","mname","maincategoryid"];

	 public function products()
    {
        return $this->hasMany('App\Products', 'shopid');
    }

}

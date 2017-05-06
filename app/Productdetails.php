<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Productdetails extends Model {

	//
	protected $table = 'productdetails';
	// protected $fillable = ["id","name","mname","maincategoryid"];

	
    public function product()
    {
        return $this->belongsTo('App\Products','productid');
    }
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

	//
	protected $table = 'category';
	protected $fillable = ["id","name","mname","maincategoryid"];

	public function maincategory()
    {
        return $this->belongsTo('App\Maincategory','maincategoryid');
    }

     public function products()
    {
        return $this->hasMany('App\Products', 'categoryid');
    }

}

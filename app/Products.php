<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model {

	//
	protected $table = 'products';
	

	public function category()
    {
        return $this->belongsTo('App\Category','categoryid');
    }

    public function collection()
    {
        return $this->belongsTo('App\Collections','collectionid');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brands','brandid');
    }

       public function shop()
    {
        return $this->belongsTo('App\Shops','shopid');
    }

     public function productdetails()
    {
        return $this->hasMany('App\Productdetails', 'productid');
    }
     public function wishlists()
    {
        return $this->hasMany('App\Wishlist', 'productid');
    }
}

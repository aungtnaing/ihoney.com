<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogs extends Model {

	//
	protected $table = 'blogs';
	
	public function user()
    {
        return $this->belongsTo('App\User','userid');
    }

}

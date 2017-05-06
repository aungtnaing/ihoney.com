<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model {

	//


	protected $table = 'medias';
	protected $fillable = ['id','pathurl','userid','mediatype'];

	public function user()
	{

		return $this->belongsTo('User');
	}

}

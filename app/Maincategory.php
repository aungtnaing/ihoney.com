<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Maincategory extends Model {

	//
	protected $table = 'maincategory';
	protected $fillable = ["id","name","mname"];

    public function categorys()
    {
        return $this->hasMany('App\Category', 'maincategoryid');
    }

    // this is a recommended way to declare event handlers
    protected static function boot() {
        parent::boot();

        static::deleting(function($maincategory) { // before delete() method call this
              
             // do the rest of the cleanup...
            $maincategory->categorys()->delete();
           

        });
    }

}

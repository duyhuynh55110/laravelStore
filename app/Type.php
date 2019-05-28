<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model {

	protected $table = 'types';
    public $timestamps = false;

    public function products(){
        return $this->hasMany('App\Product');
    }
}

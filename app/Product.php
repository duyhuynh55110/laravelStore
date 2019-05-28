<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'products';
    protected $timestamp = false;
    public function type(){
        return $this->belongsTo('App\Type');
    }
    public function manu(){
        return $this->belongsTo('App\Manu');
    }
}

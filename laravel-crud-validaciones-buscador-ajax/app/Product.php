<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
    	'id','name','description','price','cat_id','photo'
    ];

    public function category(){
    	return $this->hasMany(Product::class);
    }

}

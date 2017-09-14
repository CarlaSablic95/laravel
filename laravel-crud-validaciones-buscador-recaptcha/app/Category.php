<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['id','cat_name'];

    //funcion para vincular esta categoria con productos
    //le decimos que esta categoria tiene muchos productos
    public function product(){
    	return $this->hasMany(Product::class);
    }

}

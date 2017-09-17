<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
    	'id','cat_name'
    ];

    public function product(){
    	return $this->belongsTo(Category::class);
    }

}

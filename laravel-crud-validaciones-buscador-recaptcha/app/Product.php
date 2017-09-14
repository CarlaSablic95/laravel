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

	//$guarded = [];
	//Esta propiedad indica que los campos definidos allí no pueden ser llenados usando Mass Assignment, por lo
	//cual nunca debería enviarse un Input::get() o cualquier otro tipo de datos o arreglo proveniente de un 
	//controlador manipulable por un usuario.
	//protected $guarded = ['id'];

	//relacionamos categorias con productos
	//le decimos que este a cierta categoria
    public function category(){
    	return $this->belongsTo(Category::class, 'id');
    	//por convencion laravel busca el modelo 'category' y seguido automaticamente le añade '_id'
    	//quedando 'category_id', este campo 'category_id' debe existir en la DB, si no existe, podemos
    	//añadirlo nosostros como segundo parametro que tipo de nombre tiene, en nuestro caso le decimos
    	// que tiene el nombre de 'id'
    }
}

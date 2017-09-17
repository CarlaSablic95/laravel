<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $table='modelos';
    protected $primaryKey='id';
    public $timestamps=false;
    protected $fillable=[
        'id','modelo','id_marca'
    ];

    public function marcas()
    {
        $this->belongsTo(Marca::class);
    }
}

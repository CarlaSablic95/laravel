<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    protected $table='marcas';
    protected $primaryKey='id';
    public $timestamps = false;
    protected $fillable = [
        'id','marca'
    ];

    public function modelos()
    {
        $this->hasMany(Modelo::class);
    }
}

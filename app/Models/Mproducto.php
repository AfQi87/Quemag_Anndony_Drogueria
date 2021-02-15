<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mproducto extends Model
{
    use HasFactory;

    protected $table='producto';

    protected $primaryKey = 'Idproducto';

    public function estados(){
        return $this->belongsTo(Estado::class,'estadopro','idestado');
    }
    
    public function marcas(){
        return $this->belongsTo(Marca::class,'Marcapro','idmarca');
    }

    public function categorias(){
        return $this->belongsTo(Mcategoria::class,'Idcat','Idcategoria');
    }

    public function items(){
        return $this->hasMany(Mitem::class,'Idproducto');
    }
}

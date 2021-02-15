<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mcategoria extends Model
{
    use HasFactory;
    protected $table='categoria';
    protected $primaryKey = 'Idcategoria';
    
    public function productos(){
        return $this->hasMany(Mproducto::class,'Idcategoria');
    }

    public function estados(){
        return $this->belongsTo(Estado::class,'estadocat','idestado');
    }
}

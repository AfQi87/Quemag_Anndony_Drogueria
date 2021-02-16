<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    protected $table='marca';
    protected $primaryKey = 'idmarca';

    public function productos(){
        return $this->hasMany(Mproducto::class,'idmarca');
    }
    public function estados(){
        return $this->belongsTo(Estado::class,'estadomarca','idestado');
    }
}

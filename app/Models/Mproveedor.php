<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mproveedor extends Model
{
    use HasFactory;
    protected $table='proveedor';
    protected $primaryKey = 'Idproveedor';

    public function estados(){
        return $this->belongsTo(Estado::class,'estadoprov','idestado');
    }
}

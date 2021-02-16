<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mfactura extends Model
{
    use HasFactory;
    protected $table='factura';
    protected $primaryKey = 'Idfactura';
    public function estados(){
        return $this->belongsTo(Estado::class,'estadofac','idestado');
    }
    public function proveedores(){
        return $this->belongsTo(Mproveedor::class,'Idprove','idproveedor');
    }

    public function item(){
        return $this->hasMany(Mitem::class,'Idfactura');
    }
}

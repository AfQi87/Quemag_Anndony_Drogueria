<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table='estado';

    public function producto(){
        return $this->hasMany(Mproducto::class,'idestado');
    }
    public function proveedores(){
        return $this->hasMany(Mproveedor::class,'idestado');
    }
    public function usuarios(){
        return $this->hasMany(User::class,'idestado');
    }
    public function facturas(){
        return $this->hasMany(Mfactura::class,'idestado');
    }
    public function facturasven(){
        return $this->hasMany(FacturaVenta::class,'idestado');
    }
    public function categoria(){
        return $this->hasMany(Mcategoria::class,'idestado');
    }

}

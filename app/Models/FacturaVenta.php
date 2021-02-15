<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturaVenta extends Model
{
    use HasFactory;
    protected $table='factura_venta';
    
    public function estados(){
        return $this->belongsTo(Estado::class,'estadofacv','idestado');
    }
    public function usuarios(){
        return $this->belongsTo(User::class,'Idpersona','id');
    }

    public function items(){
        return $this->hasMany(ItemVenta::class,'Idfacven');
    }
}

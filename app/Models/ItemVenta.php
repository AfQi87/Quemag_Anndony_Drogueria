<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItenVenta extends Model
{
    use HasFactory;
    protected $table='item_factura_venta';
    public function facturasven(){
        return $this->belongsTo(FacturaVenta::class,'Idfacven','Idfacven');
    }
    public function productos(){
        return $this->belongsTo(Mproducto::class,'Idpro','Idproducto');
    }
}

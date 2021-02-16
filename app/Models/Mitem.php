<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitem extends Model
{
    use HasFactory;
    protected $table='item';
    protected $primaryKey = 'Idfac';
    
    public function estados(){
        return $this->belongsTo(Mfactura::class,'Idfac','Idfactura');
    }
    public function productos(){
        return $this->belongsTo(Mproducto::class,'Idpro','Idproducto');
    }
    public function factura(){
        return $this->belongsTo(Mfactura::class,'Idfac','Idfactura');
    }
}

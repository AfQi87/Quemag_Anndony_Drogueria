<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mtipo extends Model
{
    use HasFactory;
    protected $table='tipo';

    public function usuarios(){
        return $this->hasMany(User::class,'idtipo');
    }
}

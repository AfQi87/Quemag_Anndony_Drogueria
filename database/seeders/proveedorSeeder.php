<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class proveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $proveedores=[
            //[
              //  'NombreComoEstaEnLaTabla'=>'ValorQueQuieroAsignar'
            // ],
            ['Nombreprove'=>'Andres',
             'Direccionprove'=>'Pasto',
             'Correoprove'=>'andres@gmail.com',   
             'Telefonoprove'=>'3101234567'            
            ],
            ['Nombreprove'=>'Juan',
             'Direccionprove'=>'Cali',
             'Correoprove'=>'juan@gmail.com',   
             'Telefonoprove'=>'3101234568'            
            ],
           
           
        ];
        DB::table('proveedor')->insert($proveedores);


    }
}

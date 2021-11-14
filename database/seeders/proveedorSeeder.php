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
            ['Idproveedor'=>'1234',
             'Nombreprove'=>'Andres',
             'Direccionprove'=>'Pasto',
             'Correoprove'=>'andres@gmail.com',   
             'Telefonoprove'=>'3101234567',
             'estadoprov'=>'1'            
            ],
            ['Idproveedor'=>'4321',
             'Nombreprove'=>'Juan',
             'Direccionprove'=>'Cali',
             'Correoprove'=>'juan@gmail.com',   
             'Telefonoprove'=>'3101234568',
             'estadoprov'=>'1'           
            ],
           
           
        ];
        DB::table('proveedor')->insert($proveedores);


    }
}

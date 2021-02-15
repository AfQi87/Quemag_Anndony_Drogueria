<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $productos=[
            //[
              //  'NombreComoEstaEnLaTabla'=>'ValorQueQuieroAsignar'
            // ],
            ['Idcat'=>'1',
             'Nombrepro'=>'ibuprofeno_800Mg',
             'Descripcionpro'=>'Tabletas Caja X10Tab.',   
             'Marcapro'=>'Genfar',
             'Presentacionpro'=>'tableta',
             'Cantidadpro'=>'25',
             'Preciopro'=>'4000',
             'fotopro'=>'ibuprofeno_800Mg.jpg'
            ],
            ['Idcat'=>'2',
             'Nombrepro'=>'Loratadina_5Mg',
             'Descripcionpro'=>'Jarabe Frasco X100Ml.',   
             'Marcapro'=>'Genfar',
             'Presentacionpro'=>'jarabe',
             'Cantidadpro'=>'20',
             'Preciopro'=>'10000',
             'fotopro'=>'Loratadina_5Mg.jpg'
        ],
            ['Idcat'=>'2',
             'Nombrepro'=>'Desloratadina_5Mg',
             'Descripcionpro'=>'Tabletas Caja X10Tab.',   
             'Marcapro'=>'MK',
             'Presentacionpro'=>'tableta',
             'Cantidadpro'=>'10',
             'Preciopro'=>'30000',
             'fotopro'=>'Desloratadina_5Mg.jpg'
            ]
           
           
        ];
        DB::table('producto')->insert($productos);

    }
}

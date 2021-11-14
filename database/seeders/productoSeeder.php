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
            ['Idproducto'=>'1234',
             'Idcat'=>'1',
             'Nombrepro'=>'ibuprofeno_800Mg',
             'Descripcionpro'=>'Tabletas Caja X10Tab.',   
             'Marcapro'=>'1',
             'Cantidadpro'=>'25',
             'Preciopro'=>'4000',
             'fotopro'=>'ibuprofeno_800Mg.jpg',
             'estadopro'=>'1'
            ],
            ['Idproducto'=>'4321',
             'Idcat'=>'2',
             'Nombrepro'=>'Loratadina_5Mg',
             'Descripcionpro'=>'Jarabe Frasco X100Ml.',   
             'Marcapro'=>'2',
             'Cantidadpro'=>'20',
             'Preciopro'=>'10000',
             'fotopro'=>'Loratadina_5Mg.jpg',
             'estadopro'=>'1'
        ],
            ['Idproducto'=>'2431',
             'Idcat'=>'2',
             'Nombrepro'=>'Desloratadina_5Mg',
             'Descripcionpro'=>'Tabletas Caja X10Tab.',   
             'Marcapro'=>'3',
             'Cantidadpro'=>'10',
             'Preciopro'=>'30000',
             'fotopro'=>'Desloratadina_5Mg.jpg',
             'estadopro'=>'1'
            ]
           
           
        ];
        DB::table('producto')->insert($productos);

    }
}

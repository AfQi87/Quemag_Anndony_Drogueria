<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class itemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $items=[
            //[
              //  'NombreComoEstaEnLaTabla'=>'ValorQueQuieroAsignar'
            // ],
            ['Idpro'=>'1234',
             'Idfac'=>'1',
             'Numeroitem'=>'1',   
             'Cantidaditem'=>'25',
             'Precioitem'=>'3000',
             'Totalitem'=>'75000'
            ],
            ['Idpro'=>'4321',
             'Idfac'=>'1',
             'Numeroitem'=>'2',   
             'Cantidaditem'=>'20',
             'Precioitem'=>'9000',
             'Totalitem'=>'180000'
            ],
            ['Idpro'=>'2431',
             'Idfac'=>'2',
             'Numeroitem'=>'1',   
             'Cantidaditem'=>'10',
             'Precioitem'=>'29000',
             'Totalitem'=>'290000'
            ]

            
        ];
        DB::table('item')->insert($items);

    }
}

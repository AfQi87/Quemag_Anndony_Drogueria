<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class facturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $facturas=[
            //[
              //  'NombreComoEstaEnLaTabla'=>'ValorQueQuieroAsignar'
            // ],
            ['Idprove'=>'1234',
             'Fechafac'=>'2021-11-01',
             'Totalfac'=>'255000',
             'estadofac'=>'1'
            ],
            ['Idprove'=>'4321',
             'Fechafac'=>'2021-10-02',
             'Totalfac'=>'290000',
             'estadofac'=>'1'
            ]
            
           
        ];
        DB::table('factura')->insert($facturas);

    }
}

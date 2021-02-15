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
            ['Idprove'=>'1',
             'Fechafac'=>'2020-01-01',
             'Totalfac'=>'255000'
            ],
            ['Idprove'=>'2',
             'Fechafac'=>'2020-01-02',
             'Totalfac'=>'290000'
            ]
            
           
        ];
        DB::table('factura')->insert($facturas);

    }
}

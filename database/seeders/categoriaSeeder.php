<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categorias=[
            //[
              //  'NombreComoEstaEnLaTabla'=>'ValorQueQuieroAsignar'
            // ],
            ['Nombrecat'=>'Analgésicos'
            ],
            ['Nombrecat'=>'Antialérgicos'
            ]       
           
        ];
        DB::table('categoria')->insert($categorias);

    }
}

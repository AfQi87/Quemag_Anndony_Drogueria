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
        $categorias = [
            //[
            //  'NombreComoEstaEnLaTabla'=>'ValorQueQuieroAsignar'
            // ],
            ['nombrecat' => 'Analgésicos',
                'estadocat' => '1',
            ],
            ['nombrecat' => 'Antialérgicos',
                'estadocat' => '1',
            ],

        ];
        DB::table('categoria')->insert($categorias);

    }
}

<?php

use Illuminate\Database\Seeder;

class DirectorioContacto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacto')->insert( [
            [
                'nombre' => 'sarah sandino',
                'direccion'=> 'por residencial don bladi,urbanizacion tiste fresco.',
                'telefono'=> 74589625,
                'foto' =>  null
            ],
            [
                'nombre' => 'sarah 2 sandino',
                'direccion'=> 'por residencial don bladi,urbanizacion tiste fresco.',
                'telefono'=> 74589626,
                'foto' =>  null
            ]
        ] );
    }
}

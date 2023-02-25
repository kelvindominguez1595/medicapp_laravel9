<?php

namespace Database\Seeders;

use App\Models\Marcas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $marcas = new Marcas();
        $marcas->marca = 'Saimex';
        $marcas->save();

        $marcas = new Marcas();
        $marcas->marca = 'Laboratorios Lopez';
        $marcas->save();

        $marcas = new Marcas();
        $marcas->marca = 'Phixer';
        $marcas->save();
    }
}

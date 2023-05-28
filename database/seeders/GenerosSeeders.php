<?php

namespace Database\Seeders;

use App\Models\Generos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ge = new Generos();
        $ge->genero = 'Hombre';
        $ge->save();
        $ge = new Generos();
        $ge->genero = 'Mujer';
        $ge->save();
    }
}

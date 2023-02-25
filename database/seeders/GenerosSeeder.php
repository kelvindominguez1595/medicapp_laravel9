<?php

namespace Database\Seeders;

use App\Models\Generos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenerosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $generos = new Generos();
        $generos->genero = 'Hombre';
        $generos->save();

        $generos = new Generos();
        $generos->genero = 'Mujer';
        $generos->save();
    }
}

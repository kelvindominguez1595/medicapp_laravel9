<?php

namespace Database\Seeders;

use App\Models\Categorias;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = new Categorias();
        $categorias->categoria = 'Analgésicos';
        $categorias->save();

        $categorias = new Categorias();
        $categorias->categoria = 'Antiácidos y antiulcerosos';
        $categorias->save();

        $categorias = new Categorias();
        $categorias->categoria = 'Antialérgicos';
        $categorias->save();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CategoriasSeeder::class,
            GenerosSeeders::class,
            ProveedorSeeders::class,
            PermissionTableSeeder::class,
            ProductosSeeder::class,
            UserSeeder::class,
        ]);
    }
}

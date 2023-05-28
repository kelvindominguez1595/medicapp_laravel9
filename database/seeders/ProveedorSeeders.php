<?php

namespace Database\Seeders;

use App\Models\Proveedores;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pro = new Proveedores();
        $pro->nombre = 'bayer';
        $pro->direccion = 'san salvador';
        $pro->producto = '-';
        $pro->save();
    }
}

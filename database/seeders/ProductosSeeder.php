<?php

namespace Database\Seeders;

use App\Models\Productos;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productos = new Productos();
        $productos->categorias_id = 1;
        $productos->proveedores_id = 1;
        $productos->producto = 'Acetominofen';
        $productos->cantidad = 10;
        $productos->cantidad_minima = 4;
        $productos->estado = 0;
        $productos->numero_lote = '123';
        $productos->fecha_expiracion = '2023-02-02';
        $productos->precio_venta = '19.96';
        $productos->save();
    }
}

<?php

namespace Database\Seeders;

use App\Models\Reservas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $reservas = new Reservas();
        $reservas->fecha = '2022/07/23';
        $reservas->hora = '08:45';
        $reservas->descripcion = 'Descripcion #2';
        $reservas->paciente_id = '2';
        $reservas->doctor_id = '1';
        $reservas->save();
    }
}

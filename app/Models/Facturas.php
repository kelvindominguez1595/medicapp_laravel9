<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;
    protected $fillable = [
        'reservas_id',
        'tipo_pago'
    ];

    public function facturadetalle(){
        return $this->hasMany(FacturasDetalles::class);
    }
}

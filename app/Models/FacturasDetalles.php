<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacturasDetalles extends Model
{
    use HasFactory;

    protected $fillable = [
        'facturas_id',
        'productos_id',
        'cantidad_producto',
        'cantida_por_dia',
        'tipo_de_tratamiento',
        'otra_indicacion',
        'descuento',
        'subtotal'
    ];

    public function factura(){
        return $this->belongsTo(Facturas::class);
    }

    public function productos(){
        return $this->belongsTo(Productos::class);
    }
}

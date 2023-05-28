<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use App\Models\FacturasDetalles;
use App\Models\Productos;
use App\Models\Reservas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpParser\Node\Stmt\TryCatch;

class RecetaController extends Controller
{
    public function index($reserva_id) {
        $productos = Productos::all();
        return view('recetas.index',[
            'reserva_id' => $reserva_id,
            'productos' => $productos
        ]);
    }

    public function crearpdf (Request $request){
         $request->validate([
            'producto_idsend' => 'required',
            'cantidad' => 'required',
            'cita_id' => 'required',
            'cantidapordia' => 'required',
            'comentario' => 'required',
            'subtotal' => 'required',
        ]);

        // si todo sale bien guardamos la factura
        $factura = Facturas::create([
            'reservas_id' => $request->cita_id,
            'tipo_pago' => 'efectivo'
        ]);
        if($factura){
            foreach ($request['producto_idsend'] as $key => $value) {
                    FacturasDetalles::create([
                        'facturas_id' => $factura->id,
                        'productos_id' => $request['producto_idsend'][$key],
                        'cantidad_producto' => $request['cantidad'][$key],
                        'cantida_por_dia' => $request['cantidapordia'][$key],
                        'tipo_de_tratamiento' => 1,
                        'otra_indicacion' => $request['comentario'][$key],
                        'descuento' => 0,
                        'subtotal' => $request['subtotal'][$key]
                    ]);
            }

            $datosPaciente = Reservas::find($request->cita_id);
            $detallefactura = FacturasDetalles::where('facturas_id', $factura->id)->get();
            $pdf = Pdf::loadView('recetas.pdf', compact('datosPaciente', 'detallefactura'))->setPaper('letter', 'portrait');;
            return $pdf->stream();
        }
    }

    public function verreceta ($id){
        $datosPaciente = Reservas::find($id);
        try {
            //code...
            if($datosPaciente) {
                $factura = Facturas::where('reservas_id', $datosPaciente->id)->first();
                $detallefactura = FacturasDetalles::where('facturas_id', $factura->id)->get();
                $pdf = Pdf::loadView('recetas.pdf', compact('datosPaciente', 'detallefactura'))->setPaper('letter', 'portrait');;
                return $pdf->stream();
            } else {
                return redirect('/reservas');
            }
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/reservas');
        }
    }
}

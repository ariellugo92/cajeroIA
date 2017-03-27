<?php

namespace cajeroIA\Http\Controllers\retiros;

use Illuminate\Http\Request;
use cajeroIA\Http\Controllers\Controller;
use cajeroIA\Modelos\retiros\Retiro;
use cajeroIA\Http\Controllers\denominaciones\denominacionCordobaControlador;

class retiroControlador extends Controller
{
    // metodo para la transaccion de retirar el dinero
    public function retirar(Request $request)
    {
        $tipoMoneda = $request->tipo;
        $cant = $request->cant;

        if ($tipoMoneda == 'cordoba') {
            # si el tipo de moneda es cordoba
            # validando si hay reales para dar
            $totalCordobas = denominacionCordobaControlador::getTotalCordobasActivos();
            if($totalCordobas > $cant){
                # empezar a repartir el dinero
                $repartir = 
            }
        }
    }
}

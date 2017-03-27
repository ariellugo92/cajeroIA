<?php

namespace cajeroIA\Http\Controllers\denominaciones;

use Illuminate\Http\Request;
use cajeroIA\Http\Controllers\Controller;
use cajeroIA\Modelos\denominaciones\DenominacionCordoba;

class denominacionCordobaControlador extends Controller
{
    // metodo para obtener el total de los cordobas activos
    public static function getTotalCordobasActivos()
    {
        # code...
        $sumaTotal = 0;
        $cordobasActivos = denominacionCordobaControlador::getCordobasActivos();
        foreach ($cordobasActivos as $ca) {
            # code...
            $valor = $ca->valor;
            $cantidad = $ca->cantidad;
            $total = $valor * $cantidad;

            $sumaTotal += $total;
        }

        return $sumaTotal;
    }

    // funcion para obtener los cordobas activos
    public static function getCordobasActivos()
    {
        $cordobasActivos = DenominacionCordoba::getCordobasActivos();
        return $cordobasActivos;
    }
}

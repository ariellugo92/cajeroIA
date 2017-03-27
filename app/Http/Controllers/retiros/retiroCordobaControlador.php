<?php

namespace cajeroIA\Http\Controllers\retiros;

use Illuminate\Http\Request;
use cajeroIA\Http\Controllers\Controller;
use cajeroIA\Http\Controllers\denominaciones\denominacionCordobaControlador;

class retiroCordobaControlador extends Controller
{
    // metodo para realizar la distribucion del dinero
    public static function initDistribucionDinero($cant)
    {
        # obteniendo los cordobas activos
        $cordobasActivos = denominacionCordobaControlador::getCordobasActivos();

        # inicializando las variables de cordobas
        $billetesMilDar = 0;
        $billetesQuinientoDar = 0;
        $billetesDocientoDar = 0;
        $billetesCienDar = 0;
        $billetesCincuentaDar = 0;
        $billetesVeinteDar = 0;
        $billetesDiezDar = 0;

        # iniciando con la cantidad mayor (1000)
        $divisionCant = $cant / 1000;
        if($divisionCant >= 1){
            # si es mayor a 1 requiere billetes de 1000
            # obteniendo cuantos requiere
            $cantExplode = explode('.', $cant);
            $cantBilletesMil = $cantExplode[0];
            
            # obteniendo la cantidad vamos a validar si hay la cantidad que se requiere
            $cantBilletesMilExistente = 0;
            foreach ($cordobasActivos as $ca) {
                # cuando el billete sea mil
                if($ca->valor == 1000){
                    $cantBilletesMilExistente = $ca->cantidad;
                }
            }

            if($cantBilletesMilExistente > $cantBilletesMil){
                $billetesMilDar = $cantBilletesMil;
                $cantDada = $cantBilletesMil * 1000;
                $cant = $cant - $cantDada;
                # guardar la transaccion de los billetes dados
                
            }else if($cantBilletesMilExistente > 0){
                $billetesMilDar = $cantBilletesMilExistente;
                
            }else{
                
            }
        }
    }
}

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
        

        # inicializando las variables de cordobas
        $billetesMilDar = 0;
        $billetesQuinientoDar = 0;
        $billetesDocientoDar = 0;
        $billetesCienDar = 0;
        $billetesCincuentaDar = 0;
        $billetesVeinteDar = 0;
        $billetesDiezDar = 0;
        
        # iniciamos con los billetes de a 1000
        $calculandoBilletesMil = retiroCordobaControlador::calcSegunBillete(1000, $cant);
        if($calculandoBilletesMil != false){
            # si se requirieron billetes de mil
            $billetesMilDar = $calculandoBilletesMil;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesMil * 1000;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # iniciamos con los billetes de a 500
        $calculandoBilletesQuiniento = retiroCordobaControlador::calcSegunBillete(500, $cant);
        if($calculandoBilletesQuiniento != false){
            # si se requirieron billetes de quinientos
            $billetesQuinientoDar = $calculandoBilletesQuiniento;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesQuiniento * 500;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # iniciamos con los billetes de a 200
        $calculandoBilletesDociento = retiroCordobaControlador::calcSegunBillete(200, $cant);
        if($calculandoBilletesDociento != false){
            # si se requirieron billetes de dociento
            $billetesDocientoDar = $calculandoBilletesDociento;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesDociento * 200;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # iniciamos con los billetes de a 100
        $calculandoBilletesCien = retiroCordobaControlador::calcSegunBillete(100, $cant);
        if($calculandoBilletesCien != false){
            # si se requirieron billetes de mil
            $billetesCienDar = $calculandoBilletesCien;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesCien * 100;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # iniciamos con los billetes de a 50
        $calculandoBilletesCincuenta = retiroCordobaControlador::calcSegunBillete(50, $cant);
        if($calculandoBilletesCincuenta != false){
            # si se requirieron billetes de mil
            $billetesCincuentaDar = $calculandoBilletesCincuenta;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesCincuenta * 50;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # iniciamos con los billetes de a 20
        $calculandoBilletesVeinte = retiroCordobaControlador::calcSegunBillete(20, $cant);
        if($calculandoBilletesVeinte != false){
            # si se requirieron billetes de mil
            $billetesVeinteDar = $calculandoBilletesVeinte;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesVeinte * 20;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # iniciamos con los billetes de a 10
        $calculandoBilletesDiez = retiroCordobaControlador::calcSegunBillete(10, $cant);
        if($calculandoBilletesDiez != false){
            # si se requirieron billetes de mil
            $billetesDiezDar = $calculandoBilletesDiez;
            # obteniendo el monto dado
            $billeteDado = $calculandoBilletesDiez * 10;
            # lo restamos de la cantidad original
            $cant -= $billeteDado;
        }

        # una vez llegado aqui el ya obtuvo una cantidad igual o menor a la cantidad original
        # si es menor es porque la cantidad es menor que 10

        # llenando el array de los billetes que se dieron
        $arrBilletes = [
            'billeteMil' => $billetesMilDar,
            'billeteQuiniento' => $billetesQuinientoDar,
            'billeteDociento' => $billetesDocientoDar,
            'billeteCien' => $billetesCienDar,
            'billeteCincuenta' => $billetesCincuentaDar,
            'billeteVeinte' => $billetesVeinteDar,
            'billeteDiez' => $billetesDiezDar
        ];

        return $arrBilletes;

        // if($cant > 0){
        //     # decirle al cliente que no hay especificamente la cantidad que el quiere

        // }

        // if($cant == 0){
        //     # si se realizo toda la distribucion

        // }

    }// fin funcion

    // metodo para distribuir el billete segun la denominacion
    public static function calcSegunBillete($denominacion, $cantidad)
    {
        # dividiendo la cantidad entre la denominacion
        $divisionCant = $cantidad / $denominacion;
        if($divisionCant >= 1){
            # si se requiere esta denominacion empezar a repartir
            # obteniendo la cantidad de billestes segun la denominacion
            $cantExplode = explode('.', $divisionCant);
            $billeteRequired = $cantExplode[0];

            # viendo la cantidad de existencia de billetes segun la denominacion
            $cantBilletes = 0;
            $cordobasActivos = denominacionCordobaControlador::getCordobasActivos();
            foreach ($cordobasActivos as $ca) {
                # cuando el billete sea igual a la denominacion
                if($ca->valor == $denominacion){
                    $cantBilletes = $ca->cantidad;
                }
            }

            # repartiendo segun la existencia y lo pedido
            if($cantBilletes >= $billeteRequired){
                # si hay billetes segun la denominacion pedida
                return $billeteRequired;
            }

            # si no hay billetes de esa denominacion, retornar false
            return false;
        }

        # si se requiere una denominacion menor
        return false;
    }// fin funcion calcSegunBillete

}

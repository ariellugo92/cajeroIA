<?php

namespace cajeroIA\Http\Controllers;

use Illuminate\Http\Request;
use cajeroIA\Modelos\Cliente;

class clienteControlador extends Controller
{
    //metodo para validar que el pin sea verdadero
    public function valPin(Request $request) 
    {
        # code...
        $pin = $request->param;
        if (empty($pin)) {
            # si vino vacio
            return response()->json(['val' => '0']);
        }

        $valPinClient = Cliente::valPinClient($pin);
        if($valPinClient){
            // si el pin es correcto
            return response()->json(['val' => '1']);
        }
        
        // si no entro en el if, entonces el pin es fake
        return response()->json(['val' => '-1']);
    }
}

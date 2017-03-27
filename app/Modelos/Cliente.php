<?php

namespace cajeroIA\Modelos;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //datos fileables
    protected $fillable = [
        'nombre', 'apellido', 'numTDC', 'numPIN', 'estado'
    ];

    protected $table = 'cliente';

    public $timestamps = true;

    // validando si el pin es el correcto
    public static function valPinClient($pin)
    {
        # code...
        $valPin = Cliente::where('numPIN', $pin)->where('estado', 1)->get();
        if (count($valPin) > 0) {
            return true;
        }

        return false;
    }

}

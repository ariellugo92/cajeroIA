<?php

namespace cajeroIA\Modelos\denominaciones;

use Illuminate\Database\Eloquent\Model;

class DenominacionCordoba extends Model
{
    //datos fileables
    protected $fillable = [
        'nombre', 'valor', 'cantidad', 'estado'
    ];

    protected $table = 'denominacion_cordoba';

    public $timestamps = true;

    // metodo para obtener los cordobas activos
    public static function getCordobasActivos()
    {
        # code...
        $codobasActivos = DenominacionCordoba::select('nombre', 'valor', 'cantidad')->where('estado', 1)->get();
        return $codobasActivos;
    }

}

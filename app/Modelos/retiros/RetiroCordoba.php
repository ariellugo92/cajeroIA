<?php

namespace cajeroIA\Modelos\retiros;

use Illuminate\Database\Eloquent\Model;

class RetiroCordoba extends Model
{
    //datos fileables
    protected $fillable = [
        'idCliente', 'tipoMoneda'
    ];

    protected $table = 'retiro';

    public $timestamps = true;

    
}

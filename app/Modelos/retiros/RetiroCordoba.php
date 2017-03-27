<?php

namespace cajeroIA\Modelos\retiros;

use Illuminate\Database\Eloquent\Model;

class RetiroCordoba extends Model
{
    //datos fileables
    protected $fillable = [
        'idRetiro', 'idDenominacionCordoba', 'cantidad'
    ];

    protected $table = 'retiro_cordoba';

    public $timestamps = true;

    
}

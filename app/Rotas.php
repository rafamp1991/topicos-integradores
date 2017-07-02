<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rotas extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cidade', 'endereco_entrega', 'cod_rota',
    ];
}

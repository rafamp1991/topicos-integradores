<?php

namespace App;

use App\Pessoa;

class Funcionario extends Pessoa
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'categoria',
    ];
}

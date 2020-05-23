<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = ['nome', 'email', 'celular', 'rua', 'numero', 'bairro', 'cidade', 'status'];
}

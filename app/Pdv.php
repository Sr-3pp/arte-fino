<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdv extends Model
{
    protected $fillable = [
        'estado', 'name', 'direccion', 'details'
    ];
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\PdvTrait;

class PdvController extends Controller
{
    use PdvTrait;
    
    public function get(){
        return $this->getPdvs();
    }
}

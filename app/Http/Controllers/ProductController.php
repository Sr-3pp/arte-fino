<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\ProductTrait;

class ProductController extends Controller
{
    use ProductTrait;

    public function get(){
        return $this->getProducts();
    }
}

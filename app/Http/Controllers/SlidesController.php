<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\SlidesTrait;

class SlidesController extends Controller
{
    use SlidesTrait;

    public function get(){
        return $this->getSlides();
    }
}

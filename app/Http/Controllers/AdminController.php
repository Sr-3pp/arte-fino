<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\SlidesTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\GalleryTrait;
use App\Http\Traits\SucursalTrait;
use App\Http\Traits\PdvTrait;
use Storage;

class AdminController extends Controller
{
    use SlidesTrait, ProductTrait, GalleryTrait, SucursalTrait, PdvTrait;

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('panel');
    }

    public function newSlide(Request $r){
        return $this->addSlide($r);
    }
    public function updtSlide(Request $r, $id){
        return $this->updateSlide($r, $id);
    }
    public function delSlide($id){
        return $this->deleteSlide($id);
    }

    public function newProduct(Request $r){
        return $this->addProduct($r);
    }
}

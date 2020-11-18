<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Http\Traits\SlidesTrait;
use App\Http\Traits\ProductTrait;
use App\Http\Traits\GalleryTrait;

use Illuminate\Http\Request;

use Mail;
use App\Mail\pdvMail;
use App\Mail\ContactMail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, SlidesTrait, ProductTrait, GalleryTrait;

    public function index(){
        $slides = $this->getSlides();

        return view('home', compact('slides'));
    }

    public function catalogo(){
        $products = $this->getProducts();

        return view('store', compact('products'));

    }

    public function goArt($id){
        $product = $this->getProduct($id);

        return view('detail', compact('product'));
    }

    public function galeria(){
        $galeria = $this->getGallery();
        return view('galeria', compact('galeria'));
    }
    public function contacto(){
        return view('contacto');
    }

    public function privacy(){
        return view('privacy');
    }

    public function locationMail(Request $r){
        try {
            Mail::to('ventas@artefinomexicano.com')->send(new pdvMail($r));
        } catch (\Throwable $th) {
            return $th;
        }

        return 1;
    }
    public function contactMail(Request $r){
        try {
            Mail::to('contacto@artefinomexicano.com')->send(new ContactMail($r));
        } catch (\Throwable $th) {
            return $th;
        }

        return 1;
    }
}

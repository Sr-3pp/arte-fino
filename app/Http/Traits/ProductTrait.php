<?php

namespace App\Http\Traits;

use App\Product;
use App\Slides;
use Illuminate\Http\Request;
use Storage;
trait ProductTrait
{
    public function allProducts(){
        $products = Product::all();
        foreach ($products as $key => $s) {
            $s->attributes = json_decode($s->attributes);
            $s->slide;
        }
        return $products;
    }
    public function getProducts(){
        $products = Product::paginate(9);
        foreach ($products as $key => $s) {
            $s->attributes = json_decode($s->attributes);
            $s->slide;
        }
        return $products;
    }
    public function related(){
        $products = Product::inRandomOrder()->paginate(10);
        foreach ($products as $key => $s) {
            $s->attributes = json_decode($s->attributes);
            $s->slide;
        }
        return $products;
    }

    public function getProduct($id){
        $product = Product::find($id);
        $product->attributes = json_decode($product->attributes);
        if ($product->attributes != null) {
            foreach ($product->attributes as $key => $a) {
                if (filter_var($a->value, FILTER_VALIDATE_URL)) { 
                    $a->type = 'url';
                }
            }
        }
        return $product;
    }
    public function addProduct(Request $r){
        $data = $r->all();
        
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('products');
        }

        
        $product = Product::create($data);
        
        return $this->allProducts();
    }

    public function updateProduct(Request $r, $id){
        $product = Product::find($id);
        $data = $r->all();
        if($r->hasFile('picture')){
            Storage::delete($product->archivo);
            $data['archivo'] = $r->picture->store('products');
        }

        $product->update($data);
        $product->attributes = json_decode($product->attributes);

        return $product;
    }

    public function deleteProduct($id){
        $product = Product::find($id);
        Storage::delete($product->archivo);

        $product->delete();

        return 1;
    }

    public function searchProduct(Request $r){
        $results = Product::search($r->search)->orderBy('title', 'ASC')->get();

        return $results;
    }
}

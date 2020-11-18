<?php

namespace App\Http\Traits;

use App\Gallery;
use App\Picture;
use Illuminate\Http\Request;
use Storage;
trait GalleryTrait
{
    public function getGallery(){
        $albums = Gallery::all();
        foreach ($albums as $key => $s) {
            $s->pictures;
        }
        return $albums;
    }
    public function newAlbum(Request $r){
        $data = $r->all();        
        $album = Gallery::create($data);

        $album->pictures;
        
        return $album;
    }

    public function uploadPictures(Request $r){
        $data = $r->all();
        $elements = [];
        if($r->hasFile('pictures')){
            foreach ($r->pictures as $key => $p) {
                $data['gallery_id'] = $r->gallery_id;
                $data['archivo'] = $p->store('gallery/' . $r->gallery_id);
        
                $element = Picture::create($data);

                array_push($elements, $element);
            }
            return $this->getGallery();
        }

        return 0;

    }

    public function updateAlbum(Request $r){
        $album = Gallery::find($r->id);
        $data = $r->all();

        $album->update($data);

        return $album;
    }


    public function deletePicture($id){
        $product = Picture::find($id);
        Storage::delete($product->archivo);

        $product->delete();

        return 1;
    }

    public function deleteAlbum($id){
        $album = Gallery::find($id);

        foreach ($album->pictures as $key => $p) {
            Storage::delete($p->archivo);
            $p->delete();
        }

        $album->delete();

        return 1;
    }
}

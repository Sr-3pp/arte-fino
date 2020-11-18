<?php

namespace App\Http\Traits;

use App\Slides;
use Illuminate\Http\Request;
use Storage;
trait SlidesTrait
{
    public function getSlides(){
        $slides = Slides::all();
        foreach ($slides as $key => $s) {
            $s->attributes = json_decode($s->attributes);
            $s->product;
        }
        return $slides;
    }
    public function addSlide(Request $r){
        $data = $r->all();
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('slides');
        }
        $slide = Slides::create($data);
        $slide->attributes = json_decode($slide->attributes);
        $slide->product;
        
        return $slide;
    }

    public function updateSlide(Request $r, $id){
        $slide = Slides::find($id);
        $data = $r->all();
        if($r->hasFile('picture')){
            Storage::delete($slide->archivo);
            $data['archivo'] = $r->picture->store('slides');
        }

        $slide->update($data);
        $slide->attributes = json_decode($slide->attributes);
        $slide->product;

        return $slide;
    }

    public function deleteSlide($id){
        $slide = Slides::find($id);
        Storage::delete($slide->archivo);

        $slide->delete();

        return 1;
    }
}

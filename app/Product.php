<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'description', 'archivo', 'attributes', 'autor', 'peso', 'size', 'tecnica', 'laminado', 'material', 'elaboracion', 'precio'
    ];

    public function slide(){
        return $this->hasOne('App\Slides');
    }

    public function scopeSearch($query, $title){
        return $query->where('title', "LIKE", "%$title%");
      }
  
}

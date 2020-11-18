<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $fillable = [
        'title', 'content', 'archivo', 'attributes', 'product_id'
    ];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'archivo', 'gallery_id'
    ];

    public function gallery(){
        return $this->belongsTo('App\Gallery');
    }
}

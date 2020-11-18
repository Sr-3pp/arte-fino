<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title', 'description'
    ];

    public function pictures(){
        return $this->hasMany('App\Picture');
    }
}

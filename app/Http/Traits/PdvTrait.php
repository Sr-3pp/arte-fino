<?php

namespace App\Http\Traits;

use App\Pdv;
use Illuminate\Http\Request;
use Storage;
trait PdvTrait
{
    public function getPdvs(){
        $pdvs = Pdv::all();
        return $pdvs;
    }

    public function getPdv($id){
        $pdv = Pdv::find($id);
        return $pdv;
    }
    public function getAllPdvs(){
        $pdvs = Pdv::all();
        return $pdvs;
    }
    public function newPdv(Request $r){
        $data = $r->all();        
        $pdv = Pdv::create($data);
        
        return $pdv;
    }

    public function updatePdv(Request $r, $id){
        $pdv = Pdv::find($id);
        $data = $r->all();

        $pdv->update($data);
        return $pdv;
    }

    public function deletePdv($id){
        $pdv = Pdv::find($id);
        $pdv->delete();

        return 1;
    }
}

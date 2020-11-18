<?php

namespace App\Http\Traits;

use App\Sucursal;
use Illuminate\Http\Request;
use Storage;
trait SucursalTrait
{
    public function getSucursales(){
        $sucursals = Sucursal::all();
        return $sucursals;
    }
    public function addSucursal(Request $r){
        $data = $r->all();
        
        if($r->hasFile('archivo')){
            $data['archivo'] = $r->archivo->store('products');
        }

        
        $sucursal = Sucursal::create($data);
        
        return $sucursal;
    }

    public function updateSucursal(Request $r, $id){
        $sucursal = Sucursal::find($id);
        $data = $r->all();

        $sucursal->update($data);

        return $sucursal;
    }

    public function deleteSucursal($id){
        $sucursal = Sucursal::find($id);
        $sucursal->delete();

        return 1;
    }
}

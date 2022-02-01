<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CerrarSesionController extends Controller{

    public function cerrar_sesion(Request $request){

        if($request->session()->exists('email', 'contraseña')){
            $request->session()->forget(['email', 'contraseña']);
            $request->session()->flash('estado', 'Se cerro sesión correctamente');
            return redirect()->route("inicio.index");
        }
        else{
            $request->session()->flash('estado', 'no hay sesión iniciada');
            return redirect()->route("inicio.index");
        }
    }
    

}

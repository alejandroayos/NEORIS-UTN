<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MascotasPerdidasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tipo = $request->get("tipo");
        $sexo = $request->get("sexo");
        $tamaño = $request->get("tamaño");
        $edad = $request->get("edad");
        $localidad = $request->get("localidad");

        $mascotas_perdidas = DB::table("mascotas")
                        ->select("*")
                        ->where("estado", "PERDIDA")
                        ->where("estadoAviso", "ACEPTADO")
                        ->when($tipo, function($query) use ($tipo){
                            return $query->where('tipo', $tipo);
                        })  
                        ->when($sexo, function ($query) use ($sexo) {
                            return $query->where('sexo', $sexo); })
                        ->when($tamaño, function ($query) use ($tamaño) {
                            return $query->where('tamaño', $tamaño); })
                        ->when($edad, function ($query) use ($edad) {
                            return $query->where('edad', $edad ); })
                        ->when($localidad, function ($query) use ($localidad) {
                            return $query->where('localidad', 'like', "%".$localidad."%"); })
                        ->get();
            
        if($request->session()->has('email')){
            $usuario = DB::table("usuarios")
                        ->select("*")
                        ->where("email", $request->session()->get("email"))
                        ->get();
        }else{
            $user = (object)[
                "id_usuario" => 1
            ];
            $usuario = [$user];
        }
        
        $parametro = [
            "mascotas_perdidas" => $mascotas_perdidas,
            "usuario" => $usuario
        ];
        

        
        return view('mascotas.mascotas_perdidas.mascotas_perdidas', $parametro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //validación de id mascota
        if($mascota_perdida  = DB::table("mascotas")->select("*")->where('id_mascotas', $id)->where("estadoAviso", "ACEPTADO")->where("estado", "PERDIDA")->exists()){
            $mascota_perdida = DB::table("mascotas")
                        ->select("*")
                        ->where("estado", "PERDIDA")
                        ->where("estadoAviso", "ACEPTADO")
                        ->where('id_mascotas', $id)
                        ->get();
        }
        else{
            return redirect()->back();
        }
                        
        $usuario = DB::table("usuarios")
                        ->select("*")
                        ->where("id_usuario", $mascota_perdida[0]->id_usuario)
                        ->get();
        $parametros = [
            "usuario" => $usuario[0],
            'mascota_perdida' => $mascota_perdida[0],
            "estado" => request()->session()->get("estado")
        ];

        return view('mascotas/mascotas_perdidas/mascota_perdida', $parametros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MascotasPendientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mascotas_pendientes = DB::table("mascotas")
        ->select("*")
        ->where( 'estadoAviso' , 'PENDIENTE'  )
        ->get();


    
        if($request->session()->missing('email') || $request->session()->get('esAdmin') == 0){
            return redirect()->route('inicio.index');
        }
        else{

            $usuario = DB::table("usuarios")
                        ->select("*")
                        ->where("email", $request->session()->get("email"))
                        ->get();
            

            $parametro = [ 
                'mascotas_pendientes' => $mascotas_pendientes,
                'estado' => $request->session()->get("estado"),
                'usuario' => $usuario[0]
            ]; 


            return view( 'admin.mascotas_pendientes' , $parametro );
        }
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
    public function show(Request $request, $id)
    {


        //validación de id mascota
        if($mascota_pendiente  = DB::table("mascotas")->select("*")->where('id_mascotas', $id)->where( 'estadoAviso' , 'PENDIENTE'  )->exists()){
            $mascota_pendiente = DB::table("mascotas")
                        ->select("*")
                        ->where( 'estadoAviso' , 'PENDIENTE'  )
                        ->where('id_mascotas', $id)
                        ->get();
        }
        else{
            return redirect()->back();
        }
                        
        $usuario = DB::table("usuarios")
                        ->select("*")
                        ->where("id_usuario", $mascota_pendiente[0]->id_usuario)
                        ->get();
        $parametros = [
            "usuario" => $usuario[0],
            'mascota_pendiente' => $mascota_pendiente[0],
            "estado" => $request->session()->get("estado")
        ];

        return view('admin/mascota_pendiente', $parametros);
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
        if($request->post("aceptar") == "aceptar"){
            $estadoDelAviso = "ACEPTADO";
            $request->session()->flash("estado", "SE ACEPTO CORRECTAMENTE");
        }
        elseif($request->post("rechazar") == "rechazar"){
            $estadoDelAviso = "RECHAZADO";
            $request->session()->flash("estado", "SE RECHAZO CORRECTAMENTE");
        }

                DB::table("mascotas")
                        ->where( 'estadoAviso' , 'PENDIENTE'  )
                        ->where('id_mascotas', $id)
                        ->update([
                            "estadoAviso" => $estadoDelAviso
                        ]);
        
        
        return redirect()->route("mascotas_pendientes.index");
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

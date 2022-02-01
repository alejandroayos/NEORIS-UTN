<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Ui\Presets\React;

class PublicarAvisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
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


        $estado = $request->session()->get("estado");
        $parametro = [
            "estado" => $estado,
            "usuario" => $usuario
        ];


        if($request->session()->missing('email')){
            $request->session()->flash('estado', 'SE DEBE INICIAR SESIÓN PARA PUBLICAR UN AVISO');
            return redirect()->route("ingreso.index");
        }
        else{
            if($request->session()->get('nroDeAvisos') >= 10){
                $request->session()->flash('estado', 'NÚMERO DE AVISOS MAX 10');
            return redirect()->route("inicio.index");
            }
            else{
            return view("publicar_aviso", $parametro);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    function store(Request $request){
       
        $nombre = $request->input('nombre');
        $tipo = $request->input('tipo');
        $sexo = $request->input('sexo');
        $tamaño = $request->input('tamaño');
        $edad = $request->input('edad');
        $estado = $request->input('estado');
        $localidad = $request->input('localidad');
        $descripcion = $request->input('descripcion');
        $fecha = $request->post("fechaPerdidaEncontrada");
        
                    
        
                           
    if($request->has("foto_mascota")){
            $foto_url = request()->file("foto_mascota")->store("mascotas", "public");
        }
    else{
        $foto_url = "default_mascota.png";
    }

        try{
            DB::table('mascotas')->insert([
                'id_usuario' => $request->session()->get("id_usuario"),
                'nombre' => $nombre,
                'tipo' => $tipo,
                'sexo' =>  $sexo,
                'tamaño' => $tamaño,
                'edad'=>$edad,
                'estado'=>$estado,
                'localidad'=>$localidad,
                'descripcion'=>$descripcion,
                'foto' =>  $foto_url,
                'fechaPerdidaOEncontrada' => $fecha
            ]);

            DB::table('usuarios')
                ->where("email", $request->session()->get("email"))
                ->update([
                    'nroDeAvisos' => $request->session()->get("nroDeAvisos") + 1
                ]);

                session(['nroDeAvisos' => $request->session()->get("nroDeAvisos") + 1]);
                $request->session()->flash('estado', 'SE MANDO EL AVISO CORRECTAMENTE');
            return redirect()->route("inicio.index");
        }
        catch(QueryException $exception){
            $request->session()->flash('estado', 'SE DEBEN LLENAR TODOS LOS CAMPOS');
            return redirect()->route("publicar_aviso.create");
        }
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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

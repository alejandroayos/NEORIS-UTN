<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use ErrorException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AvisosUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  

        //Consulta de los avisos del usuario ingresado
        $mis_avisos = DB::table("mascotas")
                        ->select("*")
                        ->where("id_usuario", $request->session()->get("id_usuario"))
                        ->get();
        

        //validación de usuario registrado
        if($request->session()->missing('email')){
            return redirect()->route("ingreso.index");
        }
        else{

            //Consulta de el usuario ingresado a partir del email
            $email = $request->session()->get('email');
            $usuario = DB::table("usuarios")
                      ->select("*")
                      ->where("email", $email)
                      ->get();

            //Parametros de los avisos, el estado y el usuario para la vista
            $parametro = [
                "mis_avisos" => $mis_avisos,
                "estado" => $request->session()->get("estado"),
                "usuario" => $usuario[0]
            ];
            return view('usuarios.mis_avisos', $parametro);
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
       

       if(DB::table("mascotas")->select("*")->where('id_mascotas', $id)->exists()){
        $aviso = DB::table("mascotas")
        ->select("*")
        ->where('id_mascotas', $id)
        ->get();
       }
       else{
        return redirect()->back();
       }


       
        if($request->session()->missing('email')){
            return redirect()->route("ingreso.index");
        }
        else{
            if($request->session()->get("id_usuario") != $aviso[0]->id_usuario){
                return redirect()->route("mis_avisos.index");
            }
            else{
                return view('usuarios.aviso', ['aviso' => $aviso[0]]);
            }
        }
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

        DB::table("mascotas")
            ->where("id_mascotas", $id)
            ->delete();

        request()->session()->flash("estado", "Se borro el aviso correctamente");
        return redirect()->back();
    }
}

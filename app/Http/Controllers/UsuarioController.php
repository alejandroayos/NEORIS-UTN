<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //validación si existe usuario con el id dado
        if($usuario = DB::table("usuarios")->select("*")->where("id_usuario", $id)->exists()){

             $usuario = DB::table("usuarios")
                        ->select("*")
                        ->where("id_usuario", $id)
                        ->get();
        }
        else{
            return redirect()->back();
        }
       
        $estado = $request->session()->get("estado");
        $parametro = [
            "estado" => $estado,
            "usuario" => $usuario[0]
        ];

        //validación de usuario logeado y url con mismo id que el usuario de sesion
        if($request->session()->missing('email')){
            return redirect()->route("ingreso.index");
        }
        else{
            if($request->session()->get('id_usuario') != $id){
                return redirect()->route("inicio.index");
            }
            else{
                return view("usuarios/mis_datos", $parametro);
            }
        }
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
        $contraseña_anterior = $request->post("contraseña_anterior");
        $contraseña_nueva = $request->post("contraseña_nueva");
        $nombre = $request->post("nombre");
        $apellido = $request->post("apellido");
        $telefono = $request->post("telefono");
        $provincia = $request->post("provincia");
        $ciudad = $request->post("ciudad");

        $usuario = DB::table("usuarios")
                    ->select("*")
                    ->where("id_usuario", $id)
                    ->get();
            
        
        if($contraseña_anterior != "" && $contraseña_nueva != "" ){
            if($contraseña_anterior == $usuario[0]->contraseña){
                if($contraseña_nueva != $usuario[0]->contraseña){
                    DB::table('usuarios')
                    ->where("id_usuario", $id)
                    ->update([
                        'contraseña' => $contraseña_nueva,
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'telefono' => $telefono,
                        'provincia' => $provincia,
                        'ciudad' => $ciudad
                    ]);
                    $request->session()->flash("estado", "SE ACTUALIZARON CORRECTAMENTE LOS DATOS");
                    return redirect()->route("mis_datos.edit", $id);
                }
                else{
                    $request->session()->flash("estado", "LA CONTRASEÑA NUEVA DEBE SER DIFERENTE A LA ANTERIOR");
                    return redirect()->route("mis_datos.edit", $id);
                }
                
            }
            else{
                $request->session()->flash("estado", "CONTRASEÑA ANTERIOR INCORRECTA");
                return redirect()->route("mis_datos.edit", $id);
            }
        }
        else{
            DB::table('usuarios')
                    ->where("id_usuario", $id)
                    ->update([
                        'nombre' => $nombre,
                        'apellido' => $apellido,
                        'telefono' => $telefono,
                        'provincia' => $provincia,
                        'ciudad' => $ciudad
                    ]);
        }
        
                    $request->session()->flash("estado", "SE ACTUALIZARON LOS DATOS CORRECTAMENTE");
                    return redirect()->route("mis_datos.edit", $id);
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

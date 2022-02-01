<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
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
        if($request->session()->missing("email")){
            
            $estado = $request->session()->get("estado");
            return view("registro", ["estado" => $estado]);
        }
        else{
            return redirect()->back();
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $email = $request->post("email");
        $contraseña = $request->post("contraseña");
        $nombre = $request->post("nombre");
        $apellido = $request->post("apellido");
        $telefono = $request->post("telefono");
        $provincia = $request->post("provincia");
        $ciudad = $request->post("ciudad");

        try{
            DB::table('usuarios')->insert([
                'email' => $email,
                'contraseña' => $contraseña,
                'nombre' => $nombre,
                'apellido' => $apellido,
                'telefono' => $telefono,
                'provincia' => $provincia,
                'ciudad' => $ciudad
            ]);
            $request->session()->flash("estado", "SE REGISTRO CORRECTAMENTE");
            return redirect()->route("ingreso.index");
        }
        catch(QueryException $exception){
            $request->session()->flash("estado", "ERROR AL REGISTRARSE");
            return redirect()->route("registro.create");
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Event\RequestEvent;

use function PHPUnit\Framework\isEmpty;

class IngresoController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->missing("email")){
            $estado = $request->session()->get("estado");
            return view("ingreso", ["estado" => $estado]);
        }
        else{
            return redirect()->back();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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

        $usuario = DB::table("usuarios")
                      ->select("*")
                      ->where("email", $email)
                      ->get();
        
        if(!empty($usuario->all())){
            if($contraseña == $usuario[0]->contraseña){
                session(['email' => $email]);
                session(['contraseña' => $contraseña]);
                session(['esAdmin' => $usuario[0]->esAdmin]);
                session(['nroDeAvisos' => $usuario[0]->nroDeAvisos]);
                session(['id_usuario' => $usuario[0]->id_usuario]);

                $request->session()->flash('estado', 'SE INGRESO CORRECTAMENTE');
                return redirect()->route("inicio.index");
            }
            else{
                $request->session()->flash('estado', 'CONTRASEÑA INCORRECTA');
                return redirect()->route("ingreso.index");
            }
        }
        else{
            $request->session()->flash('estado', 'EMAIL INCORRECTO');
            return redirect()->route("ingreso.index");
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

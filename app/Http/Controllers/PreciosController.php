<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;

class PreciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::all();;
        return view('admin.precios',compact('cuentas'));        
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
        Cuenta::updateOrCreate(['id' => $request->cuentas_id],['id_usuario_cuenta' => $request->id_usuario_cuenta,'nombre_cuenta' => $request->nombre_cuenta, 'tiempo_cuenta' => $request->tiempo_cuenta, 'precio_cuenta' => $request->precio_cuenta, 'cant_pantalla' => $request->cant_pantalla]);        
        return response()->json(['success'=>'Cuenta creada con exito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cuenta = Cuenta::find($id);
        return response()->json($cuenta);
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
        $cuenta = Cuenta::findOrFail($id);
        $cuenta->delete();
    }
}


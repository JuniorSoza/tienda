<?php

namespace App\Http\Controllers;

use App\Email;
use DataTables;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {      
        $Email = Email::all(); 
        return view('admin.cuentas',compact('Email'));
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
        Email::updateOrCreate(['id' => $request->id_email],['id_servicio' => $request->id_servicio, 'email_nombre' => $request->email_nombre, 'email_contrasena' => $request->email_contrasena, 'email_tiempo' => $request->email_tiempo, 'email_comentario' => $request->email_comentario, 'email_cant_pantalla' => $request->email_cant_pantalla]);         
        return response()->json(['success'=>'Correo agregada con exito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $email = Email::find($id);
        return response()->json($email);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {    
        $email = Email::find($id);
        return response()->json($email);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Email  $email
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $email = Email::findOrFail($id);
        $email->delete();
    }
}

<?php

namespace App\Http\Controllers;

use App\Credito;
use App\Cred;
use App\User;
use DB;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Credito = DB::table('creditos')
        ->join('users','creditos.user_id','=','users.id')
        ->select('creditos.*','users.name')
        ->get();

        return view('admin.creditos',compact('Credito'));  
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
     * @param  \Illuminate\Http\Request  $request  'user_id','credito_foto','credito_codigo','revisado','credito_comentario'
     * @return \Illuminate\Http\Response   
     */
    public function store(Request $request)
    {
        Credito::updateOrCreate(['id' => $request->id_credito],['revisado' =>$request->fac_anulada ,'credito_codigo' => $request->credito_codigo,'credito_comentario' => $request->textarea_factura]);        
        Cred::updateOrCreate(['user_id' => $request->user_id],['valor_cred' =>$request->cant_creditos]);        
        return response()->json(['success'=>'credito enviado con exito.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Credito = DB::table('creditos')
        ->join('creds','creditos.user_id','=','creds.user_id')
        ->where('creditos.id', '=', $id)
        ->select('creditos.*','creds.valor_cred')        
        ->get();

        return response()->json($Credito);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credito $credito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credito  $credito
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credito $credito)
    {
        //
    }
}

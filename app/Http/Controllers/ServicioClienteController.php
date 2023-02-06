<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cuenta;
use App\Cred;
use App\Email;
use App\plan;

use Illuminate\Support\Facades\Auth;

class ServicioClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuentas = Cuenta::all();
        $Cred = Cred::where('user_id','=',Auth()->user()->id)->get();

        return view('cliente.servicioCliente',compact('cuentas','Cred')); 
        //return view('auth.login2',compact('cuentas')); 
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
        //se obtiene los datos de la solicitud con el id que se envia
        $cuenta_precio = Cuenta::find($request->servicios_option);
        //se obtiene los creditos del usuario que envia la solicitud
        $Creditos = Cred::where('user_id','=',Auth()->user()->id)->first();
        //se obtiene todas las cuentas que estan disponibles para los clientes  
        $cuentas_disponibles = Email::where('email_cant_pantalla','>',0)->Where('id_servicio', '=',$request->peticion_nombre)->Where('email_tiempo', '=',$request->peticion_tiempo)->get();
        //validacion para verificar si el cliente tiene la cantidad adecuada de creditos
        $cant_bandera =0;
        $bandera =0;   
        if($Creditos->valor_cred >= $request->peticion_precio){
            
            
        //verificar si hay cuentas agregadas en el sistema
            foreach ($cuentas_disponibles as $cuenta_dis) {
                
                if($cuenta_dis->email_cant_pantalla >= $request->peticion_cant_pantalla){                           
                do {
                    
                    $perfil_bandera = $cuenta_dis->email_cant_pantalla - $cant_bandera;
                    $bandera += 1; 
                    $cant_bandera += 1;                    
                    
                            //se descuenta la cantidad de creditos al usuario
                            $nuevo_credito = ($Creditos->valor_cred - $request->peticion_precio);
                            //si son vairas cuentas este proceso se va a procesar en un for 
                        
                            plan::create(['id_user'=>Auth()->user()->id,'id_servicio'=>$request->peticion_nombre,'cant_pantalla'=>1,'usuario'=>$cuenta_dis->email_nombre,'contrasena'=>$cuenta_dis->email_contrasena,'perfil'=>$perfil_bandera,'valor'=>$request->peticion_precio]);                                                    
                                               
                            if($request->peticion_cant_pantalla == $cant_bandera){
                                $nuevo_cant_pantalla = $cuenta_dis->email_cant_pantalla - $request->peticion_cant_pantalla;
                                Email::updateOrCreate(['id' => $cuenta_dis->id],['email_cant_pantalla' =>$nuevo_cant_pantalla]); 
                                //se ingresa el nuevo valor de los creditos                                                            
                                Cred::updateOrCreate(['user_id' => Auth()->user()->id],['valor_cred' =>$nuevo_credito]);
                                //return response()->json(['success'=>$cant_bandera]);
                                return response()->json(['success'=>$cuenta_dis->email_nombre,'clave'=>$cuenta_dis->email_contrasena,'nuevo_cred'=>$nuevo_credito]);            
                                
                            }   
                                              

                     } while ($cuenta_dis->email_cant_pantalla >= $bandera);  
                    }                           
            }                
                return response()->json(['success'=>'Solicita tu cuenta mas tarde, no se han cargado cuentas al sistema.']);
        }
        return response()->json(['success'=>'Lo sentimos, pero no dispones de creditos suficientes.']);

        

        
        
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
        $Cuenta = Cuenta::find($id);
        return response()->json($Cuenta);

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

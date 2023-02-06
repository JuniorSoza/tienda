<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cred;
use App\plan;
use Illuminate\Support\Facades\Auth;


class CuentaClienteController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Cred = Cred::where('user_id','=',Auth()->user()->id)->get();
        $planes = plan::where('id_user','=',Auth()->user()->id)->get();

        return view('cliente.cuentaCliente',compact('Cred','planes'));
    }

}

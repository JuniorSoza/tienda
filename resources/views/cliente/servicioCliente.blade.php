@extends('layouts.app')

@section('content')
<div class="container">
                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  "  href="{{ route('home2.index') }}" role="tab" aria-controls="pills-home" aria-selected="true">Perfil / Mis creditos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Solicitud de cuentas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cuentaCli') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Mis cuentas</a>
                        </li>                      
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="row">
                    <div class="col-sm-10">
                        <div class="card">
                        <div class="card-body">
                        <form id="solicitudForm" name="solicitudForm" class="form-horizontal">
                        <input type="hidden" id="peticion_nombre" name="peticion_nombre">
                        <input type="hidden" id="peticion_precio" name="peticion_precio">
                        <input type="hidden" id="peticion_tiempo" name="peticion_tiempo">
                        <input type="hidden" id="peticion_cant_pantalla" name="peticion_cant_pantalla">
                            <h5 class="card-title">Solicitar servicios</h5>
                            <div class="row"> 
                                    <div class="input-group col-lg-12 mb-3">										
                                        <select id="servicios_option" class="form-control" name="servicios_option">
                                        @foreach ($cuentas as $cuenta)
                                            @if($cuenta->id_usuario_cuenta == Auth::user()->admin)
                                             @if($cuenta->nombre_cuenta ==1)
                                                <option  value="{{$cuenta->id}}">Netflix, {{$cuenta->tiempo_cuenta}} con el precio de ${{$cuenta->precio_cuenta}},para {{$cuenta->cant_pantalla}} Pantalla.</option>
                                                @else
                                                @if($cuenta->nombre_cuenta ==2)
                                                <option  value="{{$cuenta->id}}">Spotify, {{$cuenta->tiempo_cuenta}} con el precio de ${{$cuenta->precio_cuenta}},para {{$cuenta->cant_pantalla}} Pantalla.</option>
                                                
                                                @else
                                                <option  value="{{$cuenta->id}}">HBO go, {{$cuenta->tiempo_cuenta}} con el precio de ${{$cuenta->precio_cuenta}},para {{$cuenta->cant_pantalla}} Pantalla.</option>
                                             @endif
                                             @endif                                           
                                            @endif                                           
                                        @endforeach
                                        </select>
                                    </div>
                                </div>           
                                <div class="alert alert-info">
                                    <strong >Información.!</strong>
                                    <p id="info-strong"></p>
                                    <p id="info-strong-clave"></p>
                                </div>                                    
                            <a href="#" id="saveBtn" class="btn btn-primary">Solicitar servicio</a>
                        </div>
                        </form>
                        </div>
                    </div>
                    <div class="col-sm-2">
                            <div class="card border-primary mb-3" >
                            @foreach ($Cred as $creditos)
                                <div class="card-header" align='center'>Creditos</div>
                                    <div class="card-body">                                
                                        <h1 class="card-text" align='center' id="creds">{{$creditos->valor_cred}}</h1>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>  
                    </div>                                     
                    </div>
                    </div>
</div>

@endsection

@section('js')
<script type="text/javascript">


    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

       $('#saveBtn').click(function (e) {            
	       e.preventDefault();
	        $.ajax({
	          data: $('#solicitudForm').serialize(),
	          url: "{{ route('servicioCli.store') }}",
	          type: "POST",
	          dataType: 'json',
              beforeSend: function( ) {
                    $("#saveBtn").html("Solicitando...");
                },              
	          success: function (data) {   
                /*swal({
                    title: "Exito!",
                    text: "Disfruta de tus cuentas",
                    icon: "success",
                    button: "Aceptar",
                    }); */ 
                    $("#saveBtn").html("Solicitar servicio");    
                    $("#info-strong").html(data.success);
                    $("#info-strong-clave").html(data.clave); 
                    $("#creds").html(data.nuevo_cred);
                         
	          },
	          error: function (data) {
                swal({
                    title: "Error",
                    text: "Tu servicio no pudo ser solicitado",
                    icon: "warning",
                    button: "Aceptar",
                    });
                    $("#info-strong").html(data.error); 
                    $("#saveBtn").html("Solicitar servicio");
	          }
	      });
        });


        $('body').on('change', '#servicios_option', function () {      
          cuenta_id = $("#servicios_option option:selected").val();   
	      $.get("{{ route('servicioCli.store') }}" +'/' + cuenta_id +'/edit', function (data) {
                
                $("#peticion_nombre").val(data.nombre_cuenta);
                $("#peticion_precio").val(data.precio_cuenta);
                $("#peticion_tiempo").val(data.tiempo_cuenta);
                $("#peticion_cant_pantalla").val(data.cant_pantalla); 
	      })
	   }); 

</script>
@endsection
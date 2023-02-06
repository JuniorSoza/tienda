@extends('layouts.app')

@section('content')
<div class="container">
                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Perfil / Mis creditos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('servicioCli.index') }}" role="tab" aria-controls="pills-profile" aria-selected="false">Solicitud de cuentas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('cuentaCli') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Mis cuentas</a>
                        </li>                      
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">              
                    <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Hola, bienvenido {{ Auth::user()->name }}.</h5>
                                    <div class="">
                                    <p>Nombres: {{ Auth::user()->name }}</p><br>
                                    <p>Apellidos: {{ Auth::user()->apellido }}</p><br>
                                    <p>Email: {{ Auth::user()->email }}</p><br>
                                    <p>Telefono: {{ Auth::user()->telefono }}</p><br>
                                    @if (Auth::user()->admin == 0)
                                        <p>Rol: Cliente</p>
                                        @elseif (Auth::user()->admin == 2)
                                        <p>Rol: Provedor</p>
                                    @endif
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Cargar creditos</h5>
                            <form id="formCredito" name="formCredito" type="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" id="user_id" value='{{Auth::user()->id}}'>
                            <input type="hidden" name="id_credito" id="id_credito" >
                                <div class="row"> 
                                    <div class="input-group col-lg-12 mb-3">	                        
                                        <div class="custom-file">
                                        <input type="file" class="custom-file-input"  name="credito_foto" id="credito_foto" required />                                            
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                        </div>
                                    </div>                                  
                                    <div class="col-lg-12 mb-3">
                                    <label class="sr-only" for="inlineFormInputGroupUsername">Cod Factura</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Cod Factura</div>
                                        </div>
                                        <input type="text" class="form-control" id="credito_codigo" name="credito_codigo" required >
                                    </div>
                                    </div>              
                                </div>                                              
                            <button  type="submit" class="btn btn-primary" id="saveBtn" >Cargar factura</button>
                            </form>
                        </div>
                        </div>
                    </div>                   
                    <div class="col-sm-2">
                            <div class="card border-primary mb-3" >
                            @foreach ($Cred as $creditos)
                                <div class="card-header" align='center'>Creditos</div>
                                    <div class="card-body">                                
                                        <h1 class="card-text" align='center'>{{$creditos->valor_cred}}</h1>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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

    $("#credito_foto").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});


    $('#formCredito').on('submit', function(event){
                event.preventDefault();
           //$nombre = document.getElementById('credito_foto').files[0].name;
           //console.log($nombre);
	        $.ajax({
	          data: new FormData(this),
	          url: "{{ route('home2.store') }}",
	          type: "POST",
              contentType: false,
              cache:false,
              processData: false,
	          dataType: 'json',
              beforeSend: function( ) {
                    $("#saveBtn").html("Enviando...");
                },
	          success: function (data) {    
                swal({
                    title: "Exito!",
                    text: "La factura fue enviada",
                    icon: "success",
                    button: "Aceptar",
                    });
                    $("#saveBtn").html("Cargar factura");
                    $('#formCredito').trigger("reset"); 
                    console.log(data.success);
	          },
	          error: function (data) {
                swal({
                    title: "Error!",
                    text: "La factura no fue enviada",
                    icon: "warning",
                    button: "Aceptar",
                    });
                    console.log(data.success);
                    $("#saveBtn").html("Cargar factura");
                    $('#formCredito').trigger("reset");
	          }
	      });
	    });

</script>
@endsection
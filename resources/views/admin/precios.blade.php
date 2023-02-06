@extends('layouts.app')

@section('content')
<div class="container">
                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('home.index') }}" role="tab" aria-controls="pills-home" aria-selected="true">Administracion de perfiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active"  href="#" role="tab" aria-controls="pills-profile" aria-selected="false">Administracion de precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('emails.index') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de cuentas</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('creditos.index') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de creditos</a>
                        </li>                                           
                    </ul>
                    <div class="tab-content" id="pills-tabContent">                   
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="card">            
                                    <div class="card-body">
                                    <form id="cuentasForm" name="cuentasForm" class="form-horizontal">
                                    <input type="hidden" name="cuentas_id" id="cuentas_id">
                                        <div class="input-group mb-3">										
                                            <select id="nombre_cuenta" class="form-control" name="nombre_cuenta">
                                                <option codigo="03" value="1">Netflix</option>
                                                <option codigo="12" value="2">Spotify</option>
                                                <option codigo="46" value="3">HBO go</option>
                                            </select>
                                        </div>
                                        <div class="input-group mb-3">					   
                                            <select id="tiempo_cuenta" class="form-control" name="tiempo_cuenta">                                            
                                                <option codigo="03" value="1 mes">1 mes</option>
                                                <option codigo="03" value="2 meses">2 meses</option>
                                                <option codigo="03" value="3 meses">3 meses</option>
                                                <option codigo="03" value="4 meses">4 meses</option>
                                            </select>
                                        </div>
                                        <div class="form-group">                                            
                                                <input type="text" class="form-control" id="precio_cuenta" name="precio_cuenta" placeholder="Precio cuenta" value="" maxlength="50" required="">                     
                                        </div>
                                        <div class="input-group  mb-3">					   
                                            <select id="cant_pantalla" class="form-control" name="cant_pantalla">                                            
                                                <option codigo="03" value="1">1 pantalla</option>
                                                <option codigo="03" value="2">2 pantallas</option>
                                                <option codigo="03" value="3">3 pantallas</option>
                                                <option codigo="03" value="4">4 pantallas</option>
                                            </select>
                                        </div> 
                                        <div class="input-group  mb-3">
                                        <select id="id_usuario_cuenta" class="form-control" name="id_usuario_cuenta">                                            
                                                <option codigo="" value="0">Cliente</option>
                                                <option codigo="" value="2">Provedor</option>
                                            </select>
                                        </div>                                                                     
                                        <div class="">
                                        <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Crear servicio
                                        </button>
                                        </div>
                                    </form>                
                                    
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-8">
                                <div class="card">            
                                    <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table-cuentas table" id="table-cuentas">
                                            <thead>
                                                <tr>
                                                <th>Usuario</th>
                                                <th>Servicio</th>
                                                <th>Tiempo</th>
                                                <th>Precio</th>
                                                <th>Cant Pantalla</th>                            
                                                <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($cuentas as $cuenta)
                                                <tr>
                                                <td>
                                                @if($cuenta->id_usuario_cuenta == 0)
                                                    Cliente
                                                    @else
                                                    Provedor
                                                @endif
                                                </td>
                                                <td>
                                                @if($cuenta->nombre_cuenta == 1)
                                                    Netflix
                                                    @else
                                                    @if($cuenta->nombre_cuenta == 2)
                                                    Spotify
                                                    @else
                                                    HBO go
                                                    @endif
                                                @endif                                                
                                                </td>
                                                <td>{{$cuenta->tiempo_cuenta}}</td>
                                                <td align='center'>{{$cuenta->precio_cuenta}}</td>
                                                <td align='center'>{{$cuenta->cant_pantalla}}</td>                           
                                                <td>                                                        
                                                    <a href="javascript:void(0)" type="button" id="btn-editar-cuenta" class="btn btn-success" data-id={{$cuenta->id}}>E</a>
                                                    <a href="javascript:void(0)" type="button" id="btn-eliminar-cuenta" class="btn btn-danger" data-id={{$cuenta->id}}>B</a>
                                                </td>
                                                </tr>
                                            @endforeach
                                            </tbody>                        
                                        </table>
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
       var tablaCuentas = $('#table-cuentas').DataTable({
        "columns": [
            null,
            null,
            null,
            { "orderable": false },
            { "orderable": false },
            { "orderable": false }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                }
    });
  
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

	
        $('#saveBtn').click(function (e) {            
	       e.preventDefault();
	        $.ajax({
	          data: $('#cuentasForm').serialize(),
	          url: "{{ route('precios.store') }}",
	          type: "POST",
	          dataType: 'json',
	          success: function (data) { 
                $('#cuentasForm').trigger("reset");   
                swal({
                    title: "Guardado!",
                    text: "Tu servicio fue agregado a la db",
                    icon: "success",
                    button: "Aceptar",
                    });
                $('#saveBtn').html("Crear servicio"); 
                location.reload(); 
	          },
	          error: function (data) {
                swal({
                    title: "Error",
                    text: "Tu servicio no fue agregada",
                    icon: "warning",
                    button: "Aceptar",
                    });
	          }
	      });
        });

       $('body').on('click', '#btn-editar-cuenta', function () { 
          cuenta_id = $(this).data('id');

	      $.get("{{ route('precios.store') }}" +'/' + cuenta_id +'/edit', function (data) {
	          $('#saveBtn').html("Editar Servicio");	          
	          $('#cuentas_id').val(data.id);
              $('#id_usuario_cuenta').val(data.id_usuario_cuenta);
	          $('#nombre_cuenta').val(data.nombre_cuenta);
	          $('#tiempo_cuenta').val(data.tiempo_cuenta);
	          $('#precio_cuenta').val(data.precio_cuenta);
	          $('#cant_pantalla').val(data.cant_pantalla);
	      })
	   }); 

       $('body').on('click', '#btn-eliminar-cuenta', function () { 
          cuenta_id = $(this).data('id');
          swal({
            title: "Deseas continuar?",
            text: "Si presionas ok se eliminaras el servicio!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                        type: "DELETE",
                        url: "{{ route('precios.store') }}"+'/'+cuenta_id,
                        beforeSend:function(){			    
                        },
                        success: function (data) {
                            swal({
                            title: "Exito!",
                            text: "Servicio eliminado!",
                            icon: "success",
                            button: "aceptar",
                            });
                            location.reload(); 
                        },
                        error: function (data) {
                            swal({
                            title: "Error!",
                            text: "Servicio no eliminado!",
                            icon: "warning",
                            button: "aceptar",
                            });
                        }
                     });                    
                            } 
	        }); });

      
</script>
@endsection
@extends('layouts.app')

@section('content')
<div class="container">
                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  " href="{{ route('home.index') }}" role="tab" aria-controls="pills-home" aria-selected="true">Administracion de perfiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  href="{{ route('precios.index') }}" role="tab" aria-controls="pills-profile" aria-selected="false">Administracion de precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  active"  href="#" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de cuentas</a>
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
                                <input type="hidden" name="id_email" id="id_email">                                                                
                                    <div class="input-group  mb-3">	                                        							
                                            <select id="id_servicio" class="form-control" name="id_servicio">
                                                <option codigo="03" value="1">Netflix</option>
                                                <option codigo="12" value="2">Spotify</option>
                                                <option codigo="46" value="3">HBO go</option>
                                            </select>                                        
                                    </div>                                                                                                                   
                                            <div class="form-group">
                                                <input type="email" class="form-control" id="email_nombre" name="email_nombre" placeholder="Correo de la cuenta"  maxlength="50" required>                                            
                                            </div>                                                                                     
                                        <div class="form-group">                                            
                                                <input type="text" class="form-control" id="email_contrasena" name="email_contrasena" placeholder="Contraseña"  maxlength="50" required>                                            
                                        </div>                                                          
                                    <div class="input-group  mb-3">	                                        								
                                            <select id="email_cant_pantalla" class="form-control" name="email_cant_pantalla">
                                                <option codigo="46" value="4">4 pantallas</option>
                                                <option codigo="46" value="3">3 pantallas</option>
                                                <option codigo="12" value="2">2 pantallas</option>                                                
                                                <option codigo="03" value="1">1 pantalla</option>
                                                <option codigo="03" value="0">0 pantalla</option>
                                            </select>                                        
                                    </div>  
                                    <div class="input-group  mb-3">	                                        								
                                            <select id="email_tiempo" class="form-control" name="email_tiempo">
                                                <option codigo="03" value="1 mes">1 mes</option>
                                                <option codigo="12" value="2 meses">2 meses</option>
                                                <option codigo="46" value="3 meses">3 meses</option>
                                                <option codigo="46" value="4 meses">4 meses</option>
                                            </select>                                        
                                    </div>     
                                    <textarea class="form-control" id="email_comentario" name="email_comentario" rows="3" placeholder='comentario' required></textarea><br>                                                                                                                                                                                                 
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Crear Email</button>
                                        </div>
                                    </form>                                                
                                </div>
                            </div>
                        </div>  
                        <div class="col-md-8">
                            <div class="card">            
                                <div class="card-body">
                                <div class="table-responsive">
                                        <table class="table-emails table" id="table-emails">
                                            <thead>
                                                <tr>
                                                <th>F. inicio</th>
                                                <th>Servicio</th>
                                                <th>Correo</th>
                                                <th>Contraseña</th>
                                                <th>Tiempo</th>
                                                <th>Perfil</th>                            
                                                <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($Email as $emails)
                                                <tr>
                                                <td>{{$emails->updated_at}}</td>
                                                <td>
                                                @if($emails->id_servicio==1)
                                                    Netflix
                                                    @else
                                                    @if($emails->id_servicio==2)
                                                    Spotify
                                                    @else
                                                    HBO go
                                                    @endif
                                                @endif
                                                </td>
                                                <td>{{$emails->email_nombre}}</td>
                                                <td align='center'>{{$emails->email_contrasena}}</td>
                                                <td align='center'>{{$emails->email_tiempo}}</td>
                                                <td align='center'>{{$emails->email_cant_pantalla}}</td>                           
                                                <td>                                                        
                                                    <a href="javascript:void(0)" type="button" id="btn-editar-email" class="btn btn-success" data-id={{$emails->id}}>E</a>
                                                    <a href="javascript:void(0)" type="button" id="btn-eliminar-email" class="btn btn-danger" data-id={{$emails->id}}>B</a>
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

       var tablaCuentas = $('#table-emails').DataTable({
            "columns": [
                null,
                null,
                null,
                { "orderable": false },
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
	          url: "{{ route('emails.store') }}",
	          type: "POST",
	          dataType: 'json',
	          success: function (data) {    
                swal({
                    title: "Guardado!",
                    text: "Tu cuenta fue agregado a la db",
                    icon: "success",
                    button: "Aceptar",
                    });
                    $('#cuentasForm').trigger("reset");
                    location.reload();
	          },
	          error: function (data) {
                swal({
                    title: "Error!",
                    text: "Tu cuenta no fue agregado a la db",
                    icon: "warning",
                    button: "Aceptar",
                    });
	          }
	      });
	    });

        $('body').on('click', '#btn-editar-email', function () { 
          email_id = $(this).data('id');          
	      $.get("{{ route('emails.store') }}" +'/' + email_id +'/edit', function (data) {
 
	          $('#saveBtn').html("Editar Email");	           
              $('#id_email').val(data.id);
              $('#id_servicio').val(data.id_servicio);
	          $('#email_nombre').val(data.email_nombre);
	          $('#email_contrasena').val(data.email_contrasena);
              $('#email_tiempo').val(data.email_tiempo); 
              $('#email_comentario').val(data.email_comentario);
              $('#email_cant_pantalla').val(data.email_cant_pantalla);
	          
	      })
	   }); 

       $('body').on('click', '#btn-eliminar-email', function () { 
          cuenta_id = $(this).data('id');
          swal({
            title: "Deseas continuar?",
            text: "Si presionas ok se eliminaras el Email!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                        type: "DELETE",
                        url: "{{ route('emails.store') }}"+'/'+cuenta_id,
                        beforeSend:function(){			    
                        },
                        success: function (data) {
                            swal({
                            title: "Exito!",
                            text: "Email eliminado!",
                            icon: "success",
                            button: "aceptar",
                            });
                            location.reload(); 
                        },
                        error: function (data) {
                            swal({
                            title: "Error!",
                            text: "Email no eliminado!",
                            icon: "warning",
                            button: "aceptar",
                            });
                        }
                     });                    
                            } 
	        }); });

</script>
@endsection
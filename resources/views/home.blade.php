@extends('layouts.app')

@section('content')
<div class="container">
<ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active " href="#" role="tab" aria-controls="pills-home" aria-selected="true">Administracion de perfiles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  href="{{ route('precios.index') }}" role="tab" aria-controls="pills-profile" aria-selected="false">Administracion de precios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('emails.index') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de cuentas</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('creditos.index') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de creditos</a>
                        </li>                                           
                    </ul>
        <div class="row">
        <div class="col-sm-3">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Clientes</h5>
                <p class="card-text">Se han registrado 200 personas.</p>                
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Cuentas</h5>
                <p class="card-text">Dispones de 30 cuentas.</p>                
            </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Creditos vendidos</h5>
                <p class="card-text">600 creditos.</p>                
            </div>
            </div>
        </div>  
        <div class="col-sm-3">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Creditos</h5>
                <p class="card-text">Hay 600 creditos.</p>                
            </div>
            </div>
        </div>               
        </div><br>
    <div class="row ">
        <div class="col-md-12">
            <div class="card">            
                <div class="card-body">
            <div class="table-responsive">
                    <table class="table-usuarios table" id="table-usuarios">
                        <thead>
                            <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Clave</th>
                            <th>Telefono</th>
                            <th>Provedor</th>                            
                            <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($usuarios as $user)
                            <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->apellido}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->telefono}}</td>
                            <td align='center'>
                            @if ($user->admin == 2)
                              <input href="javascript:void(0)" class="form-check-input" type="checkbox" id="btn-rol" data-id={{$user->id}} checked>
                              @else
                              <input href="javascript:void(0)" class="form-check-input" type="checkbox" id="btn-rol" data-id={{$user->id}}>
                            @endif 
                            </td>                           
                            <td>                                                        
                                <button href="javascript:void(0)" type="button" id="btn-planes" class="btn btn-success"data-id={{$user->id}}>Planes</button>
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


<!-- Modal de las solicitudes de los clientes para nuevas requisiciones de planes-->
<div class="modal fade" id="solicitudesModel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">

      <h4 class="modal-title"><p id="modal-title-usuarios"></p></h4>
    </div>
    <div class="modal-body">
      <div id="modal-body-content">
            <table class="table-solicitudes" id="table-solicitudes">
                <thead>
                 <tr>
                    <th>Servicio</th>
                    <th>N° pantalla</th>                    
                    <th>Tiempo</th>
                    <th>Correo</th>
                    <th>Aprobar</th>
                 </tr>
                </thead>
                <tbody>

                </tbody>                        
            </table>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
  </div>
</div>

<!-- Modal de los planes de los clientes donde se puden hacer renovaciones de planes-->
<div class="modal fade" id="planesModel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- Modal content-->
    <div class="modal-content">
    <div class="modal-header">

      <h4 class="modal-title"><p id="modal-title-planes"></p></h4>
    </div>
    <div class="modal-body">
      <div id="modal-body-content">
      <table class="table-planes" id="table-planes">
                <thead>
                 <tr>
                    <th>Servicio</th>
                    <th>Correo</th>
                    <th>N° pantalla</th>                    
                    <th>Tiempo</th>
                    <th>Renovar</th>
                 </tr>
                </thead>
                <tbody>

                </tbody>                        
            </table>
      </div>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
  </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
$(document).ready( function () { 

    $('#table-usuarios').DataTable({
        "columns": [
            { "orderable": false },
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

    $('#table-planes').DataTable({
        "columns": [
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            { "orderable": false },
            { "orderable": false }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                },
            "searching": false
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });    



       $('body').on('click', '#btn-planes', function () { 
          usuario_id = $(this).data('id');
          $('#modal-title-planes').html("Planes de "+usuario_id);
          $('#planesModel').modal('show');

	   }); 



});
</script>
@endsection
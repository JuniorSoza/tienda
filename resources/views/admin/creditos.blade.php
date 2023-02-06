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
                            <a class="nav-link"  href="{{ route('emails.index') }}" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de cuentas</a>
                        </li>   
                        <li class="nav-item">
                            <a class="nav-link active"  href="" role="tab" aria-controls="pills-contact" aria-selected="false">Administracion de creditos</a>
                        </li>                                           
                    </ul>
                    <div class="tab-content" id="pills-tabContent">                   
                        <div class="row ">
                            <div class="col-md-4">
                                <div class="card">            
                                    <div class="card-body">
                                    <form id="creditosForm" name="creditosForm" class="form-horizontal">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fac_anulada" id="inlineRadio1" value="1" checked>
                                        <label class="form-check-label" for="inlineRadio1">Aprobado</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="fac_anulada" id="inlineRadio2" value="2">
                                        <label class="form-check-label" for="inlineRadio2">Cancelado</label>
                                        </div>                                     
                                        <div class=" form-group input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Codigo factura</div>
                                        </div>
                                        <input type="number" class="form-control" id="credito_codigo" name="credito_codigo" required >
                                        </div>                                     
                                        <input type="hidden" name="id_credito" id="id_credito"> 
                                        <input type="hidden" name="user_id" id="user_id">                                                                     
                                        <div class="form-group input-group">
                                        <div class="input-group-prepend">
                                        <div class="input-group-text">Cant creditos</div>
                                        </div>
                                        <input type="number" class="form-control" id="cant_creditos" name="cant_creditos" required >
                                        </div>
                                                                          
                                        <img src="" alt="" id="img-credito-foto"  class="img-thumbnail"><br>
                                        <textarea class="form-control" id="textarea_factura" name="textarea_factura" rows="3"></textarea><br>                             
                                        <a href="#" type="button" id="btn-enviar-credito" class="btn btn-primary">Enviar Respuesta</a>
                                        
                                    </div>
                                </div>
                            </div> 
                            <div class="col-md-8">
                                <div class="card">            
                                    <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table-creditos table" id="table-creditos">
                                            <thead>
                                                <tr>
                                                <th>F. Ingreso</th>
                                                <th>Nombres</th>
                                                <th>COD factura</th>
                                                <th>Comentario</th> 
                                                <th>Revisado</th>                                                                           
                                                <th>Accion</th>
                                                </tr> 
                                            </thead>
                                            <tbody>
                                            @foreach ($Credito as $creditos)
                                                <tr>
                                                <td>{{$creditos->created_at}}</td>
                                                <td>{{$creditos->name}}</td>
                                                <td align='center'>{{$creditos->credito_codigo}}</td>
                                                <td >{{$creditos->credito_comentario}}</td> 
                                                <td>
                                                @if($creditos->revisado==0)
                                                <span class="badge badge-warning">Pendiente</span>
                                                    @else
                                                    @if($creditos->revisado==1)
                                                    <span class="badge badge-success">Aprobado</span>
                                                    @else
                                                    <span class="badge badge-danger">Cancelado</span>
                                                    @endif                                                
                                                    @endif
                                                </td>                                                                          
                                                <td>                                                        
                                                    <a href="javascript:void(0)" type="button" id="btn-ver-credito" class="btn btn-primary" data-id={{$creditos->id}}>Ver</a>                                                    
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

@endsection

@section('js')
<script type="text/javascript">

var tablaCuentas = $('#table-creditos').DataTable({
            "columns": [ 
                null,               
                { "orderable": false },
                null,
                { "orderable": false },
                null,
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


        $('#btn-enviar-credito').click(function (e) {         
	       e.preventDefault();
	        $.ajax({
	          data: $('#creditosForm').serialize(),
	          url: "{{ route('creditos.store') }}",
	          type: "POST",
	          dataType: 'json',
	          success: function (data) { 
                $('#creditosForm').trigger("reset");   
                swal({
                    title: "Guardado!",
                    text: "El credito fue agregado a la db",
                    icon: "success",
                    button: "Aceptar",
                    });                
                    location.reload(); 
	          },
	          error: function (data) {
                swal({
                    title: "Error",
                    text: "El credito no fue agregada",
                    icon: "warning",
                    button: "Aceptar",
                    });
	          }
	      });
        });



        $('body').on('click', '#btn-ver-credito', function () { 
          cuenta_id = $(this).data('id');          
	      $.get("{{ route('creditos.store') }}" +'/' + cuenta_id +'/edit', function (data) {            
            $('#cant_creditos').val(data[0].valor_cred);            
            $('#user_id').val(data[0].user_id);
            $('#credito_codigo').val(data[0].credito_codigo); 
            $('#id_credito').val(data[0].id);            
	                    
            $('#textarea_factura').val(data[0].credito_comentario);
            $('#img-credito-foto').attr("src", "images/"+data[0].credito_foto); 
	      })
	   }); 
      
</script>
@endsection
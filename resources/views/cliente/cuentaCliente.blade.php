@extends('layouts.app')

@section('content')
<div class="container">
                    <ul class="nav nav-pills mb-3 nav-fill" id="pills-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link  "  href="{{ route('home2.index') }}" role="tab" aria-controls="pills-home" aria-selected="true">Perfil / Mis creditos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link "  href="{{ route('servicioCli.index') }}" role="tab" aria-controls="pills-profile" aria-selected="false">Solicitud de cuentas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Mis cuentas</a>
                        </li>                      
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

                    <div class="row">
                        <div class="col-sm-10">
                            <div class="card">
                            <div class="card-body">                            
                                    <table class="table-planes" id="table-planes">
                                        <thead>
                                        <tr>
                                            <th>Servicio</th>
                                            <th>Solicitado</th>
                                            <th>Correo</th>                    
                                            <th>Contraseña</th>
                                            <th>Perfil</th>
                                            <th>Accion</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($planes as $cuenta)
                                                <tr>                                                
                                                <td>
                                                @if($cuenta->id_servicio==1)
                                                    Netflix
                                                    @else
                                                    @if($cuenta->id_servicio==2)
                                                    Spotify
                                                    @else
                                                    HBO go
                                                    @endif
                                                @endif</td>
                                                <td>{{$cuenta->created_at}}</td>
                                                <td>{{$cuenta->usuario}}</td>
                                                <td>{{$cuenta->contrasena}}</td>
                                                <td>{{$cuenta->perfil}}</td>
                                                <td><a class="btn btn-primary">Renovar</a></td>
                                                </tr>
                                            @endforeach
                                            </tbody>                        
                                    </table>
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

@endsection

@section('js')
<script type="text/javascript">
$(document).ready( function () {    
    	

        $('#table-planes').DataTable({
            "columns": [
                { "orderable": false },
                null,
                null,
                { "orderable": false },
                { "orderable": false },
                { "orderable": false }
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
                    },
            "searching": false,
            "paging":   true
        });
} );
</script>
@endsection
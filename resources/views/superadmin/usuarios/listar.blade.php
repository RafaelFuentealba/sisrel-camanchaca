@extends('superadmin.panel')

@section('contenido-principal')

<section class="section">
    <div class="section-body">
        <div class="row">            
            <div class="col-12">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6">
                        @if(Session::has('errorUsuario'))
                            <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('errorUsuario') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                        @if(Session::has('exitoUsuario'))
                            <div class="alert alert-success alert-dismissible show fade mb-4 text-center">
                                <div class="alert-body">
                                    <strong>{{ Session::get('exitoUsuario') }}</strong>
                                    <button class="close" data-dismiss="alert"><span>&times;</span></button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-3"></div>
                </div>
                
                <div class="card">
                    <div class="card-header">
                        <h4>Listado de usuarios administradores</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>RUT</th>
                                        <th>Correo</th>
                                        <th>Fecha registro</th>
                                        <th>Estado</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $contadorUsuarios = 0;    
                                    ?>
                                    @foreach ($usuarios as $usuario)
                                        <?php
                                        $contadorUsuarios = $contadorUsuarios + 1;
                                        ?>
                                        <tr>
                                            <td>{{ $contadorUsuarios }}</td>
                                            <td>{{ $usuario->usua_nombre.' '.$usuario->usua_apellido }}</td>
                                            <td>{{ $usuario->usua_rut }}</td>
                                            <td>{{ $usuario->usua_email }}</td>
                                            <td>
                                            <?php
                                                setlocale(LC_TIME, 'spanish');
                                                $fecha = ucwords(strftime('%d-%m-%Y', strtotime($usuario->usua_creado)));
                                                echo $fecha;
                                            ?>
                                            </td>
                                            <td>
                                                @if ($usuario->usua_vigente=='N')
                                                    <div class="badge badge-danger badge-shadow">Inactivo</div>
                                                @else
                                                    <div class="badge badge-success badge-shadow">Activo</div>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($usuario->usua_vigente=='N')
                                                    <form action="{{ route('superadmin.habilitar.admin', $usuario->usua_rut) }}" method="POST" style="display: inline-block">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="left" title="Habilitar"><i class="fas fa-user-plus"></i></button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('superadmin.deshabilitar.admin', $usuario->usua_rut) }}" method="POST" style="display: inline-block">
                                                        @method('PUT')
                                                        @csrf
                                                        <button type="submit" class="btn btn-icon btn-warning" data-toggle="tooltip" data-placement="left" title="Deshabilitar"><i class="fas fa-user-slash"></i></button>    
                                                    </form>                                                    
                                                @endif

                                                <form action="{{ route('superadmin.eliminar.admin', $usuario->usua_rut) }}" method="POST" style="display: inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="left" title="Eliminar"><i class="fas fa-trash"></i></button>
                                                </form>
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
</section>


<link rel="stylesheet" href="{{ asset('public/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('public/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('public/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('public/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/bundles/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('public/js/page/datatables.js') }}"></script>

@endsection

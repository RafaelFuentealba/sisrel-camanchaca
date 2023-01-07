@extends('admin.panel_admin')
@section('contenido')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Listado de organizaciones</h4>
                <div class="card-header-action">
                    <a href="{{ route('registrar.formulario') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nueva
                        organización</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Vigente</th>
                                <th>Creado</th>
                                <th>Modificado por</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                            @foreach ($organizaciones as $organizacion)
                                <tr>
                                    <td>{{ $organizacion->orga_codigo }}</td>
                                    <td>{{ $organizacion->orgar_nombre }}</td>
                                    <td>
                                        @if ($tipo->tior_vigente == 'S')
                                            <p class="badge badge-success"><strong>Activo</strong></p>
                                        @else
                                            <p class="badge badge-danger"><strong>Inactivo</strong></p>
                                        @endif
                                    </td>
                                    <td>{{ $organizacion->orga_creado }}</td>
                                    <td>{{ $organizacion->orga_usuario_mod }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.editar', $usuario->usua_rut) }}" class="btn btn-info"><i
                                            class="fas fa-edit"></i></a> --}}
                                        <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        {{-- <form action="{{ route('admin.borrar', $usuario->usua_rut) }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-danger"><i
                                                class="fas fa-trash"></i></button>
                                    </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Listado tipos de organizaciones</h4>
                <div class="card-header-action">
                    <a href="{{ route('registrar.formulario') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo
                        tipo </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Vigente</th>
                                <th>Creado</th>
                                <th>Modificado por</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                            @foreach ($tiposOrganizacion as $tipo)
                                <tr>
                                    <td>{{ $tipo->tior_codigo }}</td>
                                    <td>{{ $tipo->tior_nombre }}</td>
                                    <td>
                                        @if ($tipo->tior_vigente == 'S')
                                            <p class="badge badge-success"><strong>Activo</strong></p>
                                        @else
                                            <p class="badge badge-danger"><strong>Inactivo</strong></p>
                                        @endif
                                    </td>
                                    <td>{{ $tipo->tior_creado }}</td>
                                    <td>{{ $tipo->tior_usuario_mod }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.editar', $usuario->usua_rut) }}" class="btn btn-info"><i
                                                class="fas fa-edit"></i></a> --}}
                                        <a href="#" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                        {{-- <form action="{{ route('admin.borrar', $usuario->usua_rut) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

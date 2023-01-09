@extends('admin.panel_admin')

@section('contenido')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Listado de usuarios</h4>
                <div class="card-header-action">
                    <a href="{{ route('registrar.formulario') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Nuevo
                        Usuario</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody>
                            <tr>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Cargo</th>
                                <th>Profesión</th>
                                <th>Email</th>
                                <th>Vigencia</th>
                                <th>Rol</th>
                                <th>Editar</th>
                                <th>Borrar</th>
                            </tr>
                            @foreach ($usuarios as $usuario)
                                <tr>
                                    <td>{{ $usuario->usua_rut }}</td>
                                    <td>{{ $usuario->usua_nombre }} {{ $usuario->usua_apellido }}</td>
                                    <td>{{ $usuario->usua_cargo }}</td>
                                    <td>{{ $usuario->usua_profesion }}</td>
                                    <td>{{ $usuario->usua_email }}</td>
                                    <td>
                                        @if ($usuario->usua_vigente == 'S')
                                            <p class="badge badge-success"><strong>Activo</strong></p>
                                        @else
                                            <p class="badge badge-danger"><strong>Inactivo</strong></p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($usuario->rous_codigo == 1)
                                            <p class="badge badge-warning"><strong>Administrador</strong></p>
                                        @elseif ($usuario->rous_codigo == 2)
                                            <p class="badge badge-info"><strong>Digitador</strong></p>
                                        @elseif ($usuario->rous_codigo == 3)
                                            <p class="badge badge-primary"><strong>Observador</strong></p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.editar', [$usuario->usua_rut, $usuario->rous_codigo]) }}" class="btn btn-info"><i
                                                class="fas fa-edit"></i></a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.borrar', [$usuario->usua_rut, $usuario->rous_codigo]) }}" method="post">
                                            @csrf
                                            <button type="submit" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></button>
                                        </form>
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

@extends('digitador.home')

@section('contenido')
    <div class="card">
        <div class="card-header">
            <h4>Iniciativas Creadas</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                            <th class="text-center">
                                #
                            </th>
                            <th>Nombre de la iniciativa</th>
                            <th>Progreso</th>
                            <th>Participantes</th>
                            <th>Fecha de Inicio</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1
                            </td>
                            <td>Create a mobile app</td>
                            <td class="align-middle">
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-success width-per-40">
                                    </div>
                                </div>
                            </td>
                            <td>
                                <img alt="image" src="{{ asset('public/assets/img/users/user-1.png') }}" width="35">
                            </td>
                            <td>2018-01-20</td>
                            <td>
                                <div class="badge badge-success badge-shadow">Vigente</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                2
                            </td>
                            <td>Redesign homepage</td>
                            <td class="align-middle">
                                <div class="progress progress-xs">
                                    <div class="progress-bar width-per-60"></div>
                                </div>
                            </td>
                            <td>
                                <img alt="image" src="{{ asset('public/assets/img/users/user-1.png') }}" width="35">
                                <img alt="image" src="{{ asset('public/assets/img/users/user-3.png') }}" width="35">
                                <img alt="image" src="{{ asset('public/assets/img/users/user-4.png') }}" width="35">
                            </td>
                            <td>2018-04-10</td>
                            <td>
                                <div class="badge badge-info badge-shadow">Todo</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                3
                            </td>
                            <td>Backup database</td>
                            <td class="align-middle">
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-warning width-per-70"></div>
                                </div>
                            </td>
                            <td>
                                <img alt="image" src="{{ asset('public/assets/img/users/user-1.png') }}" width="35">
                                <img alt="image" src="{{ asset('public/assets/img/users/user-4.png') }}" width="35">
                            </td>
                            <td>2018-01-29</td>
                            <td>
                                <div class="badge badge-warning badge-shadow">In Progress</div>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                4
                            </td>
                            <td>Input data</td>
                            <td class="align-middle">
                                <div class="progress progress-xs">
                                    <div class="progress-bar bg-success width-per-90"></div>
                                </div>
                            </td>
                            <td>
                                <img alt="image" src="{{ asset('public/assets/img/users/user-2.png') }}" width="35">
                                <img alt="image" src="{{ asset('public/assets/img/users/user-5.png') }}" width="35">
                                <img alt="image" src="{{ asset('public/assets/img/users/user-4.png') }}" width="35">
                                <img alt="image" src="{{ asset('public/assets/img/users/user-1.png') }}" width="35">
                            </td>
                            <td>2018-01-16</td>
                            <td>
                                <div class="badge badge-success badge-shadow">NO Vigente</div>
                            </td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

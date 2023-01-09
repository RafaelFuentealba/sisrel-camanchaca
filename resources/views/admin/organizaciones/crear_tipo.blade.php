@extends('admin.panel_admin')
@section('contenido')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    @if (Session::has('errorRegistro'))
                        <div class="alert alert-danger alert-dismissible show fade mb-4 text-center">
                            <div class="alert-body">
                                <strong>{{ Session::get('errorRegistro') }}</strong>
                                <button class="close" data-dismiss="alert"><span>&times;</span></button>
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-2"></div>
            </div>
            <div class="row">
                <div class="col-2 col-md-2 col-lg-2"></div>
                <div class="col-8 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Nuevo tipo de organización</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.guardar.tiporg') }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label>Nombre de la organización</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                </div>
                                                <input type="text" class="form-control" id="nombre" name="nombre"
                                                    value="{{ old('nombre') }}" autocomplete="off">
                                            </div>
                                            @if ($errors->has('nombre'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close"
                                                            data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('nombre') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Seleccione un icono</label>
                                            <div class="selectgroup selectgroup-pills">
                                                <label class="selectgroup-item">
                                                    <input type="radio" class="selectgroup-input" name="icono"
                                                        id="icono" value="public/img/icons/watertower.png">
                                                    <span class="selectgroup-button selectgroup-button-icon">
                                                        <img src="{{ asset('public/img/icons/watertower.png') }}"
                                                            alt="">
                                                    </span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" class="selectgroup-input" name="icono"
                                                        id="icono" value="public/img/icons/factory.png">
                                                    <span class="selectgroup-button selectgroup-button-icon">
                                                        <img src="{{ asset('public/img/icons/factory.png') }}"
                                                            alt="">
                                                    </span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" class="selectgroup-input" name="icono"
                                                        id="icono" value="public/img/icons/hospital.png">
                                                    <span class="selectgroup-button selectgroup-button-icon">
                                                        <img src="{{ asset('public/img/icons/hospital.png') }}"
                                                            alt="">
                                                    </span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" class="selectgroup-input" name="icono"
                                                        id="icono" value="public/img/icons/junta-vecino.png">
                                                    <span class="selectgroup-button selectgroup-button-icon">
                                                        <img src="{{ asset('public/img/icons/junta-vecino.png') }}"
                                                            alt="">
                                                    </span>
                                                </label>

                                                <label class="selectgroup-item">
                                                    <input type="radio" class="selectgroup-input" name="icono"
                                                        id="icono" value="public/img/icons/school.png">
                                                    <span class="selectgroup-button selectgroup-button-icon">
                                                        <img src="{{ asset('public/img/icons/school.png') }}"
                                                            alt="">
                                                    </span>
                                                </label>
                                            </div>
                                            @if ($errors->has('icono'))
                                                <div class="alert alert-warning alert-dismissible show fade mt-2">
                                                    <div class="alert-body">
                                                        <button class="close"
                                                            data-dismiss="alert"><span>&times;</span></button>
                                                        <strong>{{ $errors->first('icono') }}</strong>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary waves-effect">Crear</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

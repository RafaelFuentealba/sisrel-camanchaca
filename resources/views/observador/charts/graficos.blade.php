@extends('observador.panel_observador')

@section('contenido')
<section class="container">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Iniciativas</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="iniciativasChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Organizaciones</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="organizacionesChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h4>Inversión</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="inverisionesChart"></canvas>
                    </div>
                </div>
            </div>

            
        </div>



        <!-- en esta seccion iran los div que almacenaran los objetivos ligados a las iniciativas -->
        <div class="col-12 col-md-6 col-lg-6">
                <div class="card-columns">
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    <div class="card border-primary mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">5</p>
                        </div>
                    </div>
                    
                    
                </div>
            </div>

    </div>
</section>
@endsection
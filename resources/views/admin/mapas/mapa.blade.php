@extends('admin.panel_admin')

@section('contenido')
    <div class="container">
        <div class="section-body">
            <div class="card" style="height: 100%; width: 100%;">
                <div class="card-header">
                    <h3>Seccion de busqueda en mapa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Buscar por</h5>
                                </div>
                                <div class="card-body">
                                    <label for="region">Seleccine región</label>
                                    <select name="region" id="region">
                                        @foreach ($regiones as $region)
                                            <option value="{{ $region->regi_cut }}">{{ $region->regi_nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Mapa red Camanchaca</h4>
                                </div>
                                <div class="card-body" style="width:100%; height: 100%;">
                                    <div id="map" class="w-auto p-3" style="height: 500px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var map = L.map('map');
        map.setView([-35.675147, -71.542969], 5);

        L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 18,
            attribution: 'Map data &copy; OpenStreetMap contributors'
        }).addTo(map);


        var seleccionado = document.getElementById("region");

        seleccionado.addEventListener("change", function() {
            var codigo = seleccionado.value;
            if (codigo == "01") {
                map.setView([-20.05800242483127, -69.6016620019451], 8);
            }
            if (codigo == "02") {
                map.setView([-23.622948005880826, -70.38653400188454], 8);
            }
            if (codigo == "03") {
                map.setView([-27.360943768381176, -70.21231254414171], 8);
            }
            if (codigo == "04") {
                map.setView([-29.964971614033693, -71.30276740916332], 8);
            }
            if (codigo == "05") {
                map.setView([-32.67610482667941, -70.97993181519182], 8);
            }
            if (codigo == "06") {
                map.setView([-34.39256174095372, -71.50276110351031], 8);
            }
            if (codigo == "07") {
                map.setView([-35.55199787816966, -71.58025873046742], 8);
            }
            if (codigo == "08") {
                map.setView([-37.33128467390922, -72.50630268253872], 8);
            }
            if (codigo == "09") {
                map.setView([-38.60414186054545, -72.39314201897861], 8);
            }
            if (codigo == "10") {
                map.setView([-41.84071943384987, -72.99956719597715], 8);
            }
            if (codigo == "11") {
                map.setView([-46.92970078731946, -73.50556554876012], 8);
            }
            if (codigo == "12") {
                map.setView([-46.92970078731946, -73.50556554876012], 6);
            }
            if (codigo == "13") {
                map.setView([-33.50495444696879, -70.64304486253128], 8);
            }
            if (codigo == "14") {
                map.setView([-39.89818766954952, -72.61076139605444], 8);
            }
            if (codigo == "15") {
                map.setView([-18.503321206562635, -69.76088125287234], 8);
            }
            if (codigo == "16") {
                map.setView([-36.582966574576375, -72.08890327576118], 8);
            }
        })
    </script>
@endsection

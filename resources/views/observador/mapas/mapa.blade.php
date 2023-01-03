@extends('observador.panel_observador')

@section('contenido')
    <div class="container">
        <div class="section-body">
            <div class="card" style="height: 100%; width: 100%;">
                <div class="card-header">
                    <h3>Seccion de busqueda en mapa</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Buscar por</h5>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <label for="region">Seleccione región</label>
                                            <select name="region" id="region" class="form-control">
                                                <option selected>Elegir</option>
                                                @foreach ($regiones as $region)
                                                    <option value="{{ $region->regi_codigo }}">{{ $region->regi_nombre }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-12 col-md-6 col-lg-6">
                                            <label for="comuna">Seleccione comuna</label>
                                            <select name="comunas" id="comunas" class="form-control">

                                            </select>
                                        </div>
                                    </div>

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


        var selectRegion = document.getElementById("region");

        selectRegion.addEventListener("change", function() {
            var codigo = selectRegion.value;
            if (codigo == "TPCA") {
                map.setView([-20.05800242483127, -69.6016620019451], 8);
            }
            if (codigo == "ANTOF") {
                map.setView([-23.622948005880826, -70.38653400188454], 8);
            }
            if (codigo == "ATCMA") {
                map.setView([-27.360943768381176, -70.21231254414171], 8);
            }
            if (codigo == "COQ") {
                map.setView([-29.964971614033693, -71.30276740916332], 8);
            }
            if (codigo == "VALPO") {
                map.setView([-32.67610482667941, -70.97993181519182], 8);
            }
            if (codigo == "LGBO") {
                map.setView([-34.39256174095372, -71.50276110351031], 8);
            }
            if (codigo == "MAULE") {
                map.setView([-35.55199787816966, -71.58025873046742], 8);
            }
            if (codigo == "BBIO") {
                map.setView([-37.33128467390922, -72.50630268253872], 8);
            }
            if (codigo == "ARAUC") {
                map.setView([-38.60414186054545, -72.39314201897861], 8);
            }
            if (codigo == "LAGOS") {
                map.setView([-41.84071943384987, -72.99956719597715], 8);
            }
            if (codigo == "AYSEN") {
                map.setView([-46.92970078731946, -73.50556554876012], 8);
            }
            if (codigo == "MAG") {
                map.setView([-46.92970078731946, -73.50556554876012], 6);
            }
            if (codigo == "RM") {
                map.setView([-33.50495444696879, -70.64304486253128], 8);
            }
            if (codigo == "RIOS") {
                map.setView([-39.89818766954952, -72.61076139605444], 8);
            }
            if (codigo == "AYP") {
                map.setView([-18.503321206562635, -69.76088125287234], 8);
            }
            if (codigo == "NUBLE") {
                map.setView([-36.582966574576375, -72.08890327576118], 8);
            }
        });

        const csrftoken = document.head.querySelector('[name~=csrf-token][content]').content;

        selectRegion.addEventListener('change', function(e) {
            fetch("{{ route('observador.map.regiones') }}", {
                method: 'POST',
                body: JSON.stringify({
                    region: e.target.value
                }),
                headers: {
                    'Content-Type': 'aplication/json',
                    'X-CSRF-TOKEN': csrftoken
                }
            }).then(response => {
                return response.json();
            }).then(data => {
                var opciones = "<option value=''>Selecione una comuna</option>";
                for (let i in data.comunas) {
                    opciones += '<option value=" ' + data.comunas[i].comu_codigo + '">' + data.comunas[i].comu_nombre + '</option>';
                }

                document.getElementById('comunas').innerHTML = opciones;
            })
        });

        var selectComuna = document.getElementById("comunas");

        selectComuna.addEventListener("change",function(e){
            fetch("{{route('observador.map.comuna')}}",{
                method:'POST',
                body: JSON.stringify({
                    comunas: e.target.value
                }),
                headers:{
                    'Content-Type': 'aplication/json',
                    'X-CSRF-TOKEN': csrftoken
                }
            }).then(response => {
                return response.json();
            }).then(data =>{
                for(let i in data.comuna){
                    var coords = JSON.parse(data.comuna[i].comu_geoubicacion)
                    map.setView([coords.lat,coords.lng],14);
                    var limites = JSON.parse(data.comuna[i].comu_geolimites);
                    var marker = L.marker([coords.lat, coords.lng]).addTo(map);
                    var figura = []
                    for( var j = 0; j < limites.clat.length;j++){

                        figura.push([limites.clat[j],limites.clng[j]])
                    }

                    var polygon = L.polygon(figura).addTo(map);

                }
            })
        })
    </script>
@endsection

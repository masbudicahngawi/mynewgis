@extends('master')

@section('isi')
<div id="map"></div>

@endsection


@section('skrip')
<script type="text/javascript" defer>
    // center of the map
    var center = [-7.5563983, 110.8208331];

    // Create the map
    var map = L.map('map').setView(center, 7);

    // Set up the OSM layer
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 20,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors;'
    }).addTo(map);

    var klaster = L.markerClusterGroup();

    // Menu penambah objek
    var editableLayers = new L.FeatureGroup();

    map.addLayer(editableLayers);

    var drawControl = new L.Control.Draw({
        draw : {
            polyline : true,
            circlemarker : false
        },
        edit : {
            featureGroup : editableLayers
        }
    });

    map.addControl(drawControl);

    // Menangkap variable $jenis dari Controller POI
    var data_jenis = {{ Illuminate\Support\Js::from($jenis) }};
    var pilihan = data_jenis.map(item => `<option value="${item.id}">${item.nama}</option>`);

    // Saat objek terbentuk
    map.on('draw:created', function(e) {
        var type    = e.layerType;
        var layer   = e.layer;

        if (type === 'marker') {
            var lat = layer.getLatLng().lat;
            var lng = layer.getLatLng().lng;

            // alert('Titik koordinat : ' + lat + ', ' + lng);

            layer.bindPopup(`<form>
                @csrf
                <table>
                <input type="hidden" id="hid_lat" value="${lat}">
                <input type="hidden" id="hid_lng" value="${lng}">
                <tr>
                <td>Nama PoI</td>
                <td><input type="text" id="nama_spot" name="nama_spot"></td>
                </tr>
                <tr>
                <td>Jenis PoI</td>
                <td>
                <select id="jenis_spot">
                <option value="">==Pilih==</option>
                
                ${pilihan}

                </select>
                </td>
                </tr>
                <tr>
                <td>Deskripsi</td>
                <td><textarea row="5" name="deskripsi" id="deskripsi"></textarea></td>
                </tr>
                <tr>
                <td></td>
                <td><button id="tmb_simpan">Simpan</button></td>
                </tr>
                </table>
                </form>`);
        }

        editableLayers.addLayer(layer);
    });

    map.addLayer(klaster);

    // Simpan

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $("body").on("click","#tmb_simpan", function (event) {
        event.preventDefault();
        let nama        = $("#nama_spot").val();
        let jenis_id    = $("#jenis_spot").val();
        let lat         = $("#hid_lat").val();
        let lng         = $("#hid_lng").val();
        let deskripsi   = $("#deskripsi").val();

        if (confirm("Simpan data ini ?")) {

            $.ajax({
                url: "{{ route('poi.store') }}",
                type : "post",
                data : {
                    mode : "marker",
                    nama : nama,
                    jenis_id : jenis_id,
                    lat : lat,
                    lng : lng,
                    deskripsi : deskripsi
                },
                success: function(hasil){
                    if (hasil.success == true) {
                        // alert(hasil.message);
                        toastr.options = { "closeButton" : true,"progressBar" : true }
                        toastr.success("Data berhasil disimpan.");
                    }else{
                        // alert("Error !");
                        toastr.options =
                        {
                            "closeButton" : true,
                            "progressBar" : true
                        }
                        toastr.error("Error !");
                    }
                }
            });

        }
    });
</script>
@endsection

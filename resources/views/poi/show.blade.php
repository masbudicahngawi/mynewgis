@extends('master')

@section('isi')
<div id="map"></div>
@endsection


@section('skrip')
<script type="text/javascript">
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

        // Fungsi Pencarian
    var controlSearch = new L.Control.Search({
        position: 'topright',
        layer: klaster,
            // propertyName: 'nama',
        initial: false,
        zoom: 17,
        marker: false,
        collapse: false
    });

    map.addControl(controlSearch);

        // Setting Icon
    var list_icon = [
        '',
        '/assets/icons/pinanyar.png',
        '/assets/icons/tempat_makan.png',
        '/assets/icons/atm.png',
        '/assets/icons/spbu.png',
        '/assets/icons/kedai.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/pin_merah.png',
        '/assets/icons/hotel.png',
        ];

        //---------------------------------------------

    var LeafIcon = L.Icon.extend({
        options: {
            iconSize: [32, 37],
            iconAnchor: [16, 37],
            popupAnchor: [1, -30]
        }
    });


        // Menangkap variable $data dari Controller POI
    var data_db = {{ Illuminate\Support\Js::from($data) }};

        // alert("data db : " + data_db);

    var arr = [];

    for (i in data_db) {

        if (data_db[i].objek == "marker") {
            arr.push({
                "lokasi": [data_db[i].longitude, data_db[i].latitude],
                "nama": data_db[i].nama,
                "jenis": "marker",
                "kode": data_db[i].jenis_id
            });
        } else if (data_db[i].objek == "polygon") {
            arr.push({
                "lokasi": JSON.parse(data_db[i].koordinat_polygon),
                "nama": data_db[i].nama,
                "jenis": "polygon",
                "kode": data_db[i].jenis_id
            });
        }
    }



    for (item in arr) {
        var nama = arr[item].nama;
            // alert(arr[item].nama + " -- " + arr[item].jenis + " : " + arr[item].lokasi);

        if (arr[item].jenis == "marker") {
            var lokasi = arr[item].lokasi;
            var kode = arr[item].kode;
            var obyek = new L.Marker(new L.latLng(lokasi), {
                icon: new LeafIcon({
                    iconUrl: list_icon[kode]
                }),
                title: nama
            }).bindPopup(
            `<div class="card rounded-0" style="width: 15rem;">
            <div class="card-body">
            <h5 class="card-title">${nama}</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <a href="#" class="btn btn-primary rounded-0">Tambah Foto</a>
            </div>
            </div>`);

            klaster.addLayer(obyek);

        } else if (arr[item].jenis == "polygon") {
            var lokasi = arr[item].lokasi;
            var obyek = new L.Polygon(lokasi, {
                title: nama
            }).bindPopup(`<div class="card rounded-0" style="width: 15rem;">
            <div class="card-body">
            <h5 class="card-title">${nama}</h5>
            <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
            <a href="#" class="btn btn-primary rounded-0">Tambah Foto</a>
            </div>
            </div>`);

            klaster.addLayer(obyek);

        }
    }

    map.addLayer(klaster);
</script>
@endsection

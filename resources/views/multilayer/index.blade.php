@extends('master')

@section('isi')
    <div id="map"></div>

    <script src="/assets/json_files/NGAWI.js"></script>
    <script src="/assets/json_files/KOTA_SURAKARTA.js"></script>
    <script src="/assets/json_files/SUKOHARJO.js"></script>
    <script src="/assets/json_files/BOYOLALI.js"></script>
    <script src="/assets/json_files/KARANGANYAR.js"></script>
    <script src="/assets/json_files/KLATEN.js"></script>
    <script src="/assets/json_files/SRAGEN.js"></script>
    <script src="/assets/json_files/WONOGIRI.js"></script>
@endsection


@section('skrip')
    <script type="text/javascript">
        var json_ngawi = desa_ngawi;
        var json_surakarta = kelurahan_surakarta;
        var json_sukoharjo = desa_sukoharjo;
        var json_boyolali = desa_boyolali;
        var json_karanganyar = desa_karanganyar;
        var json_klaten = desa_klaten;
        var json_sragen = desa_sragen;
        var json_wonogiri = desa_wonogiri;

        var FL_ngawi = new L.GeoJSON(json_ngawi, {
            style: function() {
                return {
                    color: 'grey'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
            <h5>KEC : ${feature.properties.KECAMATAN}</h5>
            <table class='table table-dark'>
            <tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
            <tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
            <tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
            <tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
            </table>`);
            }
        });

        var FL_surakarta = new L.GeoJSON(json_surakarta, {
            style: function() {
                return {
                    color: 'red'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table bordered'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });

        var FL_sukoharjo = new L.GeoJSON(json_sukoharjo, {
            style: function() {
                return {
                    color: 'magenta'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table table-dark'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });

        var FL_karanganyar = new L.GeoJSON(json_karanganyar, {
            style: function() {
                return {
                    color: 'green'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table table-dark'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });

        var FL_boyolali = new L.GeoJSON(json_boyolali, {
            style: function() {
                return {
                    color: 'blue'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table table-dark'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });

        var FL_klaten = new L.GeoJSON(json_klaten, {
            style: function() {
                return {
                    color: 'brown'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table table-dark'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });

        var FL_sragen = new L.GeoJSON(json_sragen, {
            style: function() {
                return {
                    color: '#9925be'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table table-dark'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });

        var FL_wonogiri = new L.GeoJSON(json_wonogiri, {
            style: function() {
                return {
                    color: 'purple'
                };
            },
            onEachFeature: function(feature, marker) {
                marker.bindPopup(`<h4>${feature.properties.DESA}</h4>
					<h5>KEC : ${feature.properties.KECAMATAN}</h5>
					<table class='table table-dark'>
					<tr><td>Kode Desa</td><td>${feature.properties.KODE_DESA}</td></tr>
					<tr><td>Jumlah Penduduk</td><td>${Number(feature.properties.JUMLAH_PEN).toLocaleString()}</td></tr>
					<tr><td>Jumlah KK</td><td>${Number(feature.properties.JUMLAH_KK).toLocaleString()}</td></tr>
					<tr><td>Luas Wilayah</td><td>${feature.properties.LUAS_WILAY}</td></tr>
					</table>`);
            }
        });


        var url = `https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png`;
        var attr =
            `Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors; <a href="../">Home</a>; <a href="../drawer/">Draw a POI</a>`;
        var layer_dasar = L.tileLayer(url, {
            attribution: attr
        });

        var map = L.map('map', {
            center: [-7.56, 110.79],
            zoom: 10,
            /* layers: [layer_dasar, markers] */
            layers: [layer_dasar]
        });

        var baselayer = {
            "Layar Dasar": layer_dasar
        };

        var overlays = {
            "NGAWI": FL_ngawi,
            "SURAKARTA": FL_surakarta,
            "SUKOHARJO": FL_sukoharjo,
            "BOYOLALI": FL_boyolali,
            "KARANGANYAR": FL_karanganyar,
            "KLATEN": FL_klaten,
            "SRAGEN": FL_sragen,
            "WONOGIRI": FL_wonogiri,
        };

        L.control.layers(baselayer, overlays).addTo(map);
    </script>
@endsection

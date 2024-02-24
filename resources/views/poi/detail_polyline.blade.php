@extends('master')

@section('isi')

{{-- <h5>Ini adalah data Polyline dengan ID : {{ $data->id }} dan Judul : {{ $data->nama }} </h5> --}}

{{-- <hr/> --}}

<div id="map"></div>

@endsection


@section('skrip')

<script type="text/javascript">

	// center of the map
	var center = [-7.5563983,110.8208331];

	// Create the map
	var map = L.map('map').setView(center, 13);

	// Set up the OSM layer
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		maxZoom: 20,
		attribution : 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors;'
	}).addTo(map);


	// Menangkap variable $data dari Controller
	var data_db = {{ Illuminate\Support\Js::from($data) }};

	// Susun untuk jadi Polyline
	var	nama = data_db.nama;
	var	koordinat = JSON.parse(data_db.koordinat_polygon);

	//---------------------
	// var jalur = new L.polyline(koordinat,{title: nama}).bindPopup(`<h5><strong>${nama}</strong></h5>`);
	
	// map.addLayer(jalur);

	//-------------------

	var jalur = L.polyline(koordinat, {color:'yellow', weight:10, smoothFactor:1}).addTo(map);
	var arr_of_koordinatnya = koordinat.map(point => [point.lat, point.lng]);

	var jml_point = data_db.jml_titik;
	jml_point     = parseInt(jml_point) - 1;

	var langkahnya = buat_detik_langkah(jml_point);

	animasi_jalan(arr_of_koordinatnya, langkahnya, nama);

	// zoom to polyline
	map.fitBounds(jalur.getBounds());


	// Fungsi animasi
	function animasi_jalan(arr_of_coordinates, arr_langkah, judul){

		var IkonPolyline = L.Icon.extend({
			options: {
				shadowAnchor: [8, 20],
				shadowSize: [25, 18],
				iconSize: [45, 45],
				iconAnchor: [8, 30],
				popupAnchor:  [-3, -76]
			}
		});

		var ikon_polyline = new IkonPolyline({
			iconUrl: "/assets/icons/sundul.gif",
		});

		var marker1 = L.Marker.movingMarker(arr_of_coordinates, arr_langkah,{icon : ikon_polyline}).addTo(map);

		L.polyline(arr_of_coordinates).addTo(map);

		marker1.once('click', function () {
			marker1.start();
			marker1.closePopup();
			marker1.unbindPopup();
			marker1.on('click', function() {
				if (marker1.isRunning()) {
					marker1.pause();
				} else {
					marker1.start();
				}
			});
			setTimeout(function() {
				marker1.bindPopup(`<h5><strong>${judul}</strong></h5>`).openPopup();
			}, 500);
		});

		marker1.bindPopup('Go !', {closeOnClick: false});
		marker1.openPopup();
	}

	function buat_array_langkah(jumlah_point){
		var arr_langkah = [];
		var hitungan;

		for(hitungan = 0; hitungan < jumlah_point; hitungan++){
			arr_langkah.push(10000);
		}

		return arr_langkah;
	}

	function buat_detik_langkah(jumlah_point){
		var hitungan;
		var detik_langkah = 0;

		for(hitungan = 0; hitungan < jumlah_point; hitungan++){
			detik_langkah += 1000;
		}

		return detik_langkah;
	}

</script>

@endsection
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

	var jalur = new L.polyline(koordinat,{title: nama}).bindPopup(`<h5><strong>${nama}</strong></h5>`);
	
	map.addLayer(jalur);

	// zoom to polyline
	map.fitBounds(jalur.getBounds());

</script>

@endsection
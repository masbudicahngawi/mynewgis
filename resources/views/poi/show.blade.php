@extends('master')

@section('isi')

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

	var klaster = L.markerClusterGroup();

		// Fungsi Pencarian
	var controlSearch = new L.Control.Search({
		position:'topright',		
		layer: klaster,
		initial: false,
		zoom: 17,
		marker: false,
		collapse : false
	});

	map.addControl(controlSearch);

	var data_db = {{ Illuminate\Support\Js::from($data) }};

		// alert("data db : " + data_db);

	var arr = [];

	for(i in data_db) {
		if(data_db[i].objek == "marker"){
			arr.push({
				"titik" : [data_db[i].longitude, data_db[i].latitude],
				"nama" : data_db[i].nama,
				"jenis" : "marker"
			});
		}
	}

	for(item in arr){
		if(arr[item].jenis == "marker"){
			var	titik = arr[item].titik;
			var	nama = arr[item].nama;
			var marker = new L.Marker(new L.latLng(titik),{title: nama}).bindPopup(`<h5><strong>${nama}</strong></h5>`);
		}

		klaster.addLayer(marker);
	}

	map.addLayer(klaster);

</script>

@endsection
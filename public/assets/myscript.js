// center of the map
var center = [-7.5563983,110.8208331];

// Create the map
var map = L.map('map').setView(center, 13);

// Set up the OSM layer
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	maxZoom: 20
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


// Editabel
var editableLayers = new L.FeatureGroup();

map.addLayer(editableLayers);

var drawControl = new L.Control.Draw({
	draw : {
		polyline : true,
		rectangle : true,
		circle : true,
		circlemarker : false
	},
	edit : {
		featureGroup : editableLayers
	}
});

map.addControl(drawControl);

// var data_db = {{ Illuminate\Support\Js::from($data) }};
var data_db = "<?php echo $newdata;?>";

alert("data db : " + data_db);

var arr = [];// alert(datanya[0].nama);

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
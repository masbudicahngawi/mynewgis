@extends('master')

@section('gaya')
<style type="text/css">
    body {
        padding: 0;
        margin: 0;
    }

    html,
    body,
    #peta {
        height: 100%;
        width: 100vw;
    }

    #formulir {
        position: fixed;
        top: 5px;
        right: 10px;
        z-index: 1000;
    }
</style>
@endsection

@section('isi')
<div id="peta"></div>
<div id="formulir">
    <h5>Data Lokasi secara Online</h5>
    <form>
        @csrf
        <label for="inputNama">Logitude</label>
        <input type="text" id="lo" name= "lo" class="form-control rounded-0">

        <label for="inputNama">Latitude</label>
        <input type="text" id="la" name= "la" class="form-control rounded-0">

        <label for="ket">Keterangan</label>
        <textarea id="ket" name="keterangan" class="form-control rounded-0"></textarea>
    </form>
    <br />
    <button class="btn btn-danger rounded-0" id="simpan">Simpan</button>
</div>
@endsection

@section('skrip')
<script type="text/javascript">
    var petaku = L.map('peta').fitWorld();

    L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        maxZoom: 30,
        tileSize: 512,
        zoomOffset: -1
    }).addTo(petaku);


        //Cari peta sesuai koordinat device
    petaku.locate({
        setView: true,
        maxZoom: 16
    });

        //Jika koordinat device ditemukan..
    function onLocationFound(e) {
        var radius = e.accuracy;

        L.marker(e.latlng).addTo(petaku)
        .bindPopup("You are within " + radius + " meters from this point").openPopup();

        L.circle(e.latlng, radius).addTo(petaku);

        document.getElementById("la").value = e.latlng.lat;
        document.getElementById("lo").value = e.latlng.lng;
    }

    petaku.on('locationfound', onLocationFound);


        //Bila koordinat tidak terdeteksi
    function onLocationError(e) {
        alert(e.message);
    }

    petaku.on('locationerror', onLocationError);

        //Bila koordinat tidak terdeteksi
    function onLocationError(e) {
        alert(e.message);
    }

    petaku.on('locationerror', onLocationError);

        //Deklarasi tombol simpan
    tmb_simpan = document.getElementById("simpan");


        // tmb_simpan.addEventListener("click",ajax_simpan(document.getElementById("lo").value, document.getElementById("la").value, document.getElementById("ket")));

        //Jika tombol simpan diklik, kirim koordinat dan keterangan via ajax ke simpan.php
    tmb_simpan.addEventListener("click", function() {
        if (confirm("Simpan data ini ?")) {

            let ajax = new XMLHttpRequest();

            ajax.open("post", "{{ route('poi.store') }}", true);
            ajax.setRequestHeader("Content-Type", "application/json");
            ajax.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                        // teks responnya : {"success":true,"message":"Data Berhasil Disimpan!"}
                        // alert(this.responseText);
                    var hasil = JSON.parse(this.responseText);
                    if (hasil.success == true) {
                        alert("Data berhasil disimpan !")
                    }
                        //var jsonData = JSON.parse(ajax.response);
                        //console.log(jsonData);
                }
            }

            let data = {
                "mode": "mobile",
                "_token": "<?php echo csrf_token(); ?>",
                "lo": document.getElementById("lo").value,
                "la": document.getElementById("la").value,
                "keterangan": document.getElementById("ket").value
            };

            ajax.send(JSON.stringify(data));

        }
    });
</script>
@endsection

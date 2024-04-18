@extends('master')

@section('title', 'Home')

@section('isi')
    <div class="accordion" id="accordionExample">
        <!-- Menu Pertama -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <h2><strong>Mobile</strong></h2>
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    <strong>BUKAN Mobile Legend lho ya.</strong> disini untuk nge-tag lokasi real-time yang bergantung
                    dengan web-location.
                    <hr />
                    <a class="bg-primary text-white" href="./mobile/">Tag lokasi</a>
                </div>
            </div>
        </div>
        <!-- Menu Kedua -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <h2><strong>My POI</strong></h2>
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Disini kita bisa melihat, edit, dan nge-tag POI.
                    <div class="list-group">
                        <a class="list-group-item list-group-item-action" href="/poi/show">Show POI</a>
                        <a class="list-group-item list-group-item-action" href="/poi/polyline">Show Route</a>
                        <a class="list-group-item list-group-item-action" href="/poi/tambah">Tambah POI</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu Ketiga -->
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <h2><strong>Multi Layer</strong></h2>
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#accordionExample">
                <div class="accordion-body">
                    Menampilkan shape wilayah Kabupaten hingga Desa di wilayah Solo Raya dan Plat AE.
                    <hr />
                    <a class="bg-primary text-white" href="">Multilayer</a>
                </div>
            </div>
        </div>

    </div>
@endsection

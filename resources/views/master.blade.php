<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', 'MyNewGIS')</title>

    <style>
        #map {
            height: 800px;
        }
    </style>

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/leaflet/leaflet.css" rel="stylesheet" type="text/css" />
    <link href="/assets/leaflet/leaflet.draw.css" rel="stylesheet" type="text/css" />
    <link href="/assets/leaflet_search/leaflet-search.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/leaflet_cluster/MarkerCluster.css" rel="stylesheet" type="text/css" />
    <link href="/assets/leaflet_cluster/MarkerCluster.Default.css" rel="stylesheet" type="text/css" />
    <link href="/assets/toastr/toastr.min.css" rel="stylesheet" type="text/css" />

    @yield('gaya', '')

</head>

<body>
    <nav class="navbar navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">mynewgis</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/poi/show">PoI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/poi/tambah">Tambah</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/multilayer">Multilayer</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="/logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('isi')

    <script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/leaflet/leaflet.js" type="text/javascript"></script>
    <script src="/assets/leaflet/leaflet.draw.js" type="text/javascript"></script>
    <script src="/assets/leaflet_search/leaflet-search.min.js" type="text/javascript"></script>
    <script src="/assets/leaflet_cluster/leaflet.markercluster.js"></script>
    <script src="/assets/movingmarker/MovingMarker.js" type="text/javascript"></script>
    <script src="/assets/toastr/toastr.min.js" type="text/javascript"></script>

    @yield('skrip')

</body>

</html>

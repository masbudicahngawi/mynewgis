<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <!-- Always force latest IE rendering engine or request Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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

    @yield('gaya', '')

</head>

<body>

    @yield('isi')

    <script src="/assets/jquery-3.7.1.min.js" type="text/javascript"></script>
    <script src="/assets/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="/assets/leaflet/leaflet.js" type="text/javascript"></script>
    <script src="/assets/leaflet/leaflet.draw.js" type="text/javascript"></script>
    <script src="/assets/leaflet_search/leaflet-search.min.js" type="text/javascript"></script>
    <script src="/assets/leaflet_cluster/leaflet.markercluster.js"></script>
    <script src="/assets/movingmarker/MovingMarker.js" type="text/javascript"></script>

    @yield('skrip')

</body>

</html>

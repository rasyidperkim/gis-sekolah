@extends('layouts.frontend')

@section('content')

    <div id="map" style="width: 100vw; height: 75vh;"></div>

    <script src="{{ asset('js/iconLayers.js') }}"></script>
    <script src="https://rawgit.com/MarcChasse/leaflet.ScaleFactor/master/leaflet.scalefactor.min.js"></script>

    <script>
        /* Basemap Layers */
        let osmStreet = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 21,
                maxNativeZoom: 19,
                alt: "osm basemap",
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1
            });

        let osmDark = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 21,
                alt: "dark basemap",
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/dark-v10'
            });

        let osmSatellite = L.tileLayer(
            'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                maxZoom: 21,
                alt: "satellite basemap",
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
                    'Imagery Â© <a href="https://www.mapbox.com/">Mapbox</a>',
                id: 'mapbox/satellite-streets-v10'
            });

        let cartoLight = L.tileLayer("https://cartodb-basemaps-{s}.global.ssl.fastly.net/light_all/{z}/{x}/{y}.png", {
            maxZoom: 21,
            alt: "light basemap",
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>'
        });

        let map = L.map('map', {
            zoom: 13,
            center: [-3.314771, 114.6185566],
            layers: [osmDark]

        });

        let baseLayers = {
            "Street Map": cartoLight,

            "Mapbox Street": osmStreet,

            "Mapbox Dark": osmDark,

            "Mapbox Satellite": osmSatellite
        };

        L.control.layers(baseLayers).addTo(map);

        L.control.scalefactor().addTo(map);

        var layers = [osmDark];

        var iconLayersControl = new L.Control.IconLayers(
            [{
                    title: 'Street', // use any string
                    layer: osmStreet, // any ILayer
                    icon: '{{ asset('img/icons/openstreetmap_de.png') }}' // 80x80 icon
                },
                {
                    title: 'Satellite',
                    layer: osmSatellite,
                    icon: '{{ asset('img/icons/here_satelliteday.png') }}'
                },
                {
                    title: 'Greyscale',
                    layer: cartoLight,
                    icon: '{{ asset('img/icons/cartodb_positron.png') }}'
                },
                {
                    title: 'Dark',
                    layer: osmDark,
                    icon: '{{ asset('img/icons/stamen_toner.png') }}'
                },

            ], {
                position: 'bottomright',
                maxLayersInRow: 2
            }
        );

        // new L.Control.IconLayers(layers)
        // new L.Control.IconLayers(options)
        // are also ok

        iconLayersControl.addTo(map);

        iconLayersControl.on('activelayerchange', function(e) {
            console.log('layer switched', e.layer);
        });
    </script>


@endsection

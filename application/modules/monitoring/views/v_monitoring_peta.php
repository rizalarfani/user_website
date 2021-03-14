<script src='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.js'></script>
<link href='https://api.mapbox.com/mapbox-gl-js/v1.4.1/mapbox-gl.css' rel='stylesheet' />
<style>
    .marker {
        background-size: cover;
        width: 35px;
        height: 35px;
        border-radius: 50%;
        cursor: pointer;
    }

    .mapboxgl-popup {
        max-width: 500px;
    }

    .mapboxgl-popup img {
        height: 100%;
        width: 100%;
    }

    .mapboxgl-popup p {
        text-align: left;
        /*font-size: 18px;*/
    }

    .mapboxgl-popup-content {
        text-align: center;
        font-family: 'Open Sans', sans-serif;
    }
</style>
<section class="content-header">
    <h1>
        Monitoring
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Monitoring</a></li>
        <li class="active">Monitoring Peta</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Monitoring peta</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="col-md-12">
                <div id='map' style='width: 100%; height: 500px;'></div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function() {
        $('#monitoring').addClass('active');
        $('#lokasi').addClass('active');
        LoadMap();
        var user_location = [109.0833213, -6.8696789];
        mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YWwxMjMiLCJhIjoiY2p6OTNtYmQ4MWU4YjNncWlrbjFicGJ4aSJ9.2oVjdv79elD6xsm5CRe9TA';
        var map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v11',
            center: user_location,
            zoom: 12
        });
        // Add zoom and rotation controls to the map.
        map.addControl(new mapboxgl.NavigationControl());

        function LoadMap() {
            $.ajax({
                url: '<?php echo base_url('monitoring/getDataKebakaran') ?>',
                dataType: 'JSON',
                type: 'GET',
                async: true,
                beforeSend: function(respon) {
                    console.log('Loading');
                },
                success: function(respon) {
                    if (respon.status) {
                        console.log(respon.status);
                        var user_location = [109.0833213, -6.8696789];
                        mapboxgl.accessToken = 'pk.eyJ1Ijoicml6YWwxMjMiLCJhIjoiY2p6OTNtYmQ4MWU4YjNncWlrbjFicGJ4aSJ9.2oVjdv79elD6xsm5CRe9TA';
                        var map = new mapboxgl.Map({
                            container: 'map',
                            style: 'mapbox://styles/mapbox/streets-v11',
                            center: user_location,
                            zoom: 12
                        });
                        // Add zoom and rotation controls to the map.
                        map.addControl(new mapboxgl.NavigationControl());
                        $.each(respon.data, function(item, data) {
                            var geojson = {
                                type: 'FeatureCollection',
                                features: [{
                                    type: 'Feature',
                                    geometry: {
                                        type: 'Point',
                                        coordinates: [data.latitude, data.longitude]
                                    },
                                    properties: {
                                        suhu: '' + data.suhu + '',
                                        tgl: '' + data.tanggal_kejadian + '',
                                        img: '<?php echo base_url('uploads/image/') ?>' + data.foto + '',
                                        lat: '' + data.latitude + '',
                                        lng: '' + data.longitude + '',
                                    }
                                }]
                            };
                            geojson.features.forEach(function(marker) {
                                // create a HTML element for each feature
                                var el = document.createElement('div');
                                el.className = 'marker';
                                el.style.backgroundImage = 'url(<?php echo base_url('assets/icon.png') ?>)';
                                // make a marker for each feature and add to the map
                                // Add to map
                                new mapboxgl.Marker(el)
                                    .setLngLat(marker.geometry.coordinates)
                                    .setPopup(new mapboxgl.Popup({
                                            offset: 25
                                        })
                                        .setHTML(
                                            `<div class="row"> 
                                                <div class="col-md-6 col-sm-6 col-6 float-left">
                                                    <img src="` + marker.properties.img + `" class="img-thumbnail">
                                                </div>
                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <p>Tgl Kejadian : ` + marker.properties.tgl + `</p>
                                                    <p>Suhu : ` + marker.properties.suhu + `</p>
                                                </div>
                                            </div>
                                            <div class="row p-2">
                                                <div class="col-md-6 col-sm-6 col-6">
                                                    <a href="https://www.google.com/maps/search/?api=1&query=` + marker.properties.lng + `, ` + marker.properties.lat + `" class="btn btn-success btn-block">
                                                    Navigation
                                                    </a>
                                                </div>
                                            </div>`)
                                    ).addTo(map)
                            });
                        });
                    } else {
                        toastr.error(respon.messege);
                    }
                }
            });
        }
    });
</script>
<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <?php echo($vars->getCountry()) ?>
        </div>
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center py-4 mx-auto">
                <div>
                    <h5 class="card-title"><?php echo($vars->getTitle()) ?></h5>
                    <p class="card-text"><?php echo 'Latitudo: '.($vars->getLatitudo()); echo '  Longitude '.($vars->getLongitude())?></p>
                    <a href=<?php echo "/delete?id=".$vars->getId() ?> class="btn btn-danger">Delete</a>
                </div>
            </div>
            <div class="col-6 my-2">
                <div class="h-100">
                    <div id="map" class="w-100" style="height: 300px"></div>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <?php echo($vars->getDate()) ?>
        </div>
    </div>
</div>

<script>
    function initMap() {
        const uluru = { lat: <?php echo $vars->getLatitudo() ?>, lng: <?php echo $vars->getLongitude() ?>};
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 10,
            center: uluru,
            styles: [
                { elementType: "geometry", stylers: [{ color: "#242f3e" }] },
                { elementType: "labels.text.stroke", stylers: [{ color: "#242f3e" }] },
                { elementType: "labels.text.fill", stylers: [{ color: "#746855" }] },
                {
                    featureType: "administrative.locality",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#d59563" }],
                },
                {
                    featureType: "poi",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#d59563" }],
                },
                {
                    featureType: "poi.park",
                    elementType: "geometry",
                    stylers: [{ color: "#263c3f" }],
                },
                {
                    featureType: "poi.park",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#6b9a76" }],
                },
                {
                    featureType: "road",
                    elementType: "geometry",
                    stylers: [{ color: "#38414e" }],
                },
                {
                    featureType: "road",
                    elementType: "geometry.stroke",
                    stylers: [{ color: "#212a37" }],
                },
                {
                    featureType: "road",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#9ca5b3" }],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry",
                    stylers: [{ color: "#746855" }],
                },
                {
                    featureType: "road.highway",
                    elementType: "geometry.stroke",
                    stylers: [{ color: "#1f2835" }],
                },
                {
                    featureType: "road.highway",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#f3d19c" }],
                },
                {
                    featureType: "transit",
                    elementType: "geometry",
                    stylers: [{ color: "#2f3948" }],
                },
                {
                    featureType: "transit.station",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#d59563" }],
                },
                {
                    featureType: "water",
                    elementType: "geometry",
                    stylers: [{ color: "#17263c" }],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.fill",
                    stylers: [{ color: "#515c6d" }],
                },
                {
                    featureType: "water",
                    elementType: "labels.text.stroke",
                    stylers: [{ color: "#17263c" }],
                },
            ],
        });
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
</script>

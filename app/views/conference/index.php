<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <?php echo($vars->getCountry()) ?>
        </div>
        <div class="row">
            <div class="col-6 d-flex align-items-center justify-content-center py-4 mx-auto">
                <div>
                    <h5 class="card-title"><?php echo($vars->getTitle()) ?></h5>
                    <?php if ($vars->getLatitudo()): ?>
                        <p class="card-text"><?php echo 'Latitudo: '.($vars->getLatitudo()); echo '  Longitude '.($vars->getLongitude())?></p>
                    <?php endif; ?>
                    <button data-conference=<?php echo $vars->getId() ?> class="delete-btn btn btn-danger">Delete</button>
                </div>
            </div>
            <?php if ($vars->getLatitudo()): ?>
                <div class="col-6 my-2">
                    <div class="h-100">
                        <div id="map" class="w-100" style="height: 300px"></div>
                    </div>
                </div>
            <?php endif; ?>
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
        });
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
    }
</script>
<script type="text/javascript" src="/public/scripts/delete.js"></script>
<script async src="https://maps.googleapis.com/maps/api/js?key=<?php $apiKey = require $_SERVER['DOCUMENT_ROOT'].'/config/googleMaps.php'; echo $apiKey['mapApiKey']?>.&callback=initMap"></script>

<div class="container">
    <div class="card text-center">
        <div class="card-header">
            <?php echo($vars->getCountry()) ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo($vars->getTitle()) ?></h5>
            <p class="card-text"><?php echo 'Latitudo: '.($vars->getLatitudo()); echo '  Longitude '.($vars->getLongitude())?></p>
            <a href=<?php echo "/delete?id=".$vars->getId() ?> class="btn btn-danger">Delete</a>
        </div>
        <div class="card-footer text-muted">
            <?php echo($vars->getDate()) ?>
        </div>
        <div class="row">
            <div classs="col-6 mx-auto">
                <div id="map"></div>
            </div>
        </div>
    </div>
</div>

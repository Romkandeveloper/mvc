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
                    <button id="delete-btn" data-conference=<?php echo $vars->getId() ?> class="btn btn-danger">Delete</button>
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
    const deleteBtn = document.getElementById('delete-btn');
    deleteBtn && deleteBtn.addEventListener('click', async function(e) {
        const formData = new FormData();
        formData.append('id', e.target.getAttribute('data-conference'));
        let response = await fetch('/deleteConference', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            window.location.href = '/';
        } else {
            alert("Ошибка HTTP: " + response.status);
        }
    });

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

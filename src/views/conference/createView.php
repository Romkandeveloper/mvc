<div class="container">
    <form id="create-form">
        <div class="card text-center">
            <div class="card-header row">
                <div class="col-3 mx-auto">
                    <select name="country" required class="custom-select custom-select-sm">
                        <option selected value="Ukraine">Ukraine</option>
                        <option value="Germany">Germany</option>
                        <option value="Izrael">Izrael</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-6 d-flex align-items-center justify-content-center py-4 mx-auto">
                    <div class="row col-12">
                        <div class="col-7 mx-auto">
                            <input type="text" name="title" required class="form-control ds-input p-1 w-100" id="" placeholder="Title" style="position: relative; vertical-align: top;">
                        </div>
                        <div class="col-6 mt-3">
                            <input type="number" name="latitude" step="0.000000000000001" min="-90" max="90" class="form-control ds-input p-1 w-100" id="" placeholder="Latitude" style="position: relative; vertical-align: top;">
                        </div>
                        <div class="col-6 mt-3">
                            <input type="number" name="longitude" step="0.000000000000001" min="-180" max="180" class="form-control ds-input p-1 w-100" id="" placeholder="Longitude" style="position: relative; vertical-align: top;">
                        </div>
                    </div>
                </div>
                <div class="col-6 my-2">
                    <div class="h-100">
                        <div id="map" class="w-100" style="height: 300px"></div>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
                <input type="text" required name="date" class="ds-input p-1" id="" placeholder="Date" style="position: relative; vertical-align: top;">
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-6">
                <a href="/" class="btn btn-warning w-100">Back</a>
            </div>
            <div class="col-6">
                <button type="submit" class="btn btn-success w-100">Save</button>
            </div>
        </div>
    </form>
</div>

<script>
    //set calendar plugin
    $('input[name="date"]').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        minDate: new Date(),
        locale: {
            format: 'M/DD hh:mm A'
        }
    });

    //set coordRows
    const coordRows = {
        latitudeRow: document.querySelector('input[name="latitude"]'),
        longitudeRow: document.querySelector('input[name="longitude"]'),
    }

    function setRowsCoords (coords) {
        if(coordRows.latitudeRow) coordRows.latitudeRow.value = coords.latitude;
        if (coordRows.longitudeRow) coordRows.longitudeRow.value = coords.longitude;
    }

    //setMap
    function initMap() {
        let marker = null;
        const uluru = { lat: 0, lng: 0};
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 2,
            center: uluru,
        });
        map.addListener('click', function(e) {
            setMapMarker(e, e.latLng);
            const position = marker.getPosition();
            setRowsCoords({latitude: position.lat(), longitude: position.lng()});
        });
        const setMapMarker = (e, coords = {
                lat: coordRows.latitudeRow.value !== '' && +coordRows.latitudeRow.value,
                lng: coordRows.longitudeRow.value !== '' && +coordRows.longitudeRow.value,
        }) => {
            marker && marker.setMap(null);
            if (coords.lat && coords.lng) {
                marker = new google.maps.Marker({
                    position: coords,
                    map: map,
                    draggable:true,
                });
                map.setCenter(coords);
                marker.addListener('dragend', function(e) {
                    const position = marker.getPosition();
                    setRowsCoords({latitude: position.lat(), longitude: position.lng()});
                });
            }
        }

        if(coordRows.latitudeRow && coordRows.longitudeRow) {
            coordRows.longitudeRow.addEventListener('input', setMapMarker);
            coordRows.latitudeRow.addEventListener('input', setMapMarker);
        }
    }

    //form
    const form = document.getElementById('create-form');
    form && form.addEventListener('submit', async function(e) {
        e.preventDefault();
        const formData = new FormData();
        const rows = {
            title: this.title.value,
            country: this.country.value,
            date: this.date.value,
        };
        if (this.latitude.value && this.longitude.value) {
            rows['latitude'] =  this.latitude.value;
            rows['longitude'] = this.longitude.value;
        }

        for (key in rows) {
            formData.append(key, rows[key]);
        }
        const response = await fetch('/createConference', {
            method: 'POST',
            body: formData,
        });
        if (response.ok) {
            window.location.href = '/';
        } else {
            alert("Ошибка HTTP: " + response.status);
        }

    });
</script>
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

    setMapMarker();
}
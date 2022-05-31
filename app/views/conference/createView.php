<div class="container">
    <form id="create-form" data-path="/createConference">
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
                            <input type="number" name="latitude" maxlength="17" step=any min="-90" max="90" class="form-control ds-input p-1 w-100" id="" placeholder="Latitude" style="position: relative; vertical-align: top;">
                        </div>
                        <div class="col-6 mt-3">
                            <input type="number" name="longitude" maxlength="18" step=any min="-180" max="180" class="form-control ds-input p-1 w-100" id="" placeholder="Longitude" style="position: relative; vertical-align: top;">
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

<script type="text/javascript" src="/public/scripts/calendar.js"></script>
<script type="text/javascript" src="/public/scripts/map.js"></script>
<script type="text/javascript" src="/public/scripts/create-edit.js"></script>
<script async src="https://maps.googleapis.com/maps/api/js?key=<?php $apiKey = require $_SERVER['DOCUMENT_ROOT'].'/.env.php'; echo $apiKey['MAP_API_KEY']?>.&callback=initMap"></script>

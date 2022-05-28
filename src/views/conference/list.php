<div class="container">
    <div class="list-group">
        <?php foreach ($vars as $conference): ?>
            <a href="#" class="list-group-item list-group-item-action flex-column align-items-start active mb-2">
                <div class="d-flex align-items-center w-100">
                    <h5 class="mb-1 mr-3"><?php echo $conference['title'] ?></h5>
                    <small><?php echo $conference['date'] ?></small>
                    <button type="button" class="btn btn-danger ml-auto">Delete</button>
                </div>
            </a>
        <?php endforeach; ?>
    </div>
</div>
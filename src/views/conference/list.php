<div class="container">
    <div class="list-group">
        <?php foreach ($vars as $conference): ?>
            <a href="/" class="list-group-item list-group-item-action flex-column align-items-start active mb-2">
                <div class="d-flex align-items-center w-100">
                    <h5 class="mb-1 mr-3"><?php echo $conference->getTitle() ?></h5>
                    <small><?php echo $conference->getDate() ?></small>
                    <button type="button" class="btn btn-secondary ml-auto">Edit</button>
                    <button type="button" class="btn btn-danger ml-2">Delete</button>
                </div>
            </a>
        <?php endforeach; ?>
        <button type="button" class="btn btn-success ml-auto">+ Create</button>
    </div>
</div>
<div class="container">
    <div class="list-group">
        <?php foreach ($vars as $conference): ?>
            <div class="list-group-item list-group-item-action flex-column align-items-start active mb-2">
                <div class="d-flex align-items-center w-100">
                    <a href=<?php echo "/conference?id=".$conference->getId() ?> class="d-flex align-items-center w-100 text-white">
                        <h5 class="mb-1 mr-3"><?php echo $conference->getTitle() ?></h5>
                        <small><?php echo $conference->getDate() ?></small>
                    </a>
                    <a href=<?php echo '/edit?id='.$conference->getId() ?> class="btn btn-secondary ml-auto">Edit</a>
                    <button type="button" data-conference=<?php echo $conference->getId() ?> class="delete-btn btn btn-danger ml-2">Delete</button>
                </div>
            </div>
        <?php endforeach; ?>
        <a href="/create" type="button" class="btn btn-success ml-auto">+ Create</a>
    </div>
</div>

<script type="text/javascript" src="/public/scripts/delete.js"></script>
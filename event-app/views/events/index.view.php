<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <div class="mb-4">
        <a href="/event/create" class="btn btn-primary">Create Event</a>
    </div>

    <!-- Showing existing events -->
    <div class="list-group">
        <?php foreach ($events as $event): ?>
            <a href="/event?id=<?= $event["id"] ?>" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= htmlspecialchars($event["event_name"]); ?></h5>
                    <!-- <small>Text here</small> -->
                </div>
                <p class="mb-1"><?= htmlspecialchars($event["place"]); ?></p>
                <small><?= convertTime($event["start_time"]) ?> - <?= convertTime($event["end_time"]) ?></small>
            </a>
        <?php endforeach; ?>
    </div>
</div>

<?php require basePath('views/partials/footer.php'); ?>
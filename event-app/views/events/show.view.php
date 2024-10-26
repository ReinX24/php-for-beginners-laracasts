<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <div class="d-flex gap-2 mb-4">
        <a href="/event/edit?id=<?= $event['id'] ?>" class="btn btn-lg btn-primary">Edit</a>
        <a href="/event/delete?id=<?= $event['id'] ?>" class="btn btn-lg btn-danger">Delete</a>
    </div>

    <a href="/attendee/add?id=<?= $event['id'] ?>" class="btn btn-lg btn-success mb-4">Add Attendee</a>

    <!-- Showing selected event info -->
    <h4>Location: <?= htmlspecialchars($event['place']); ?></h4>
    <p>Start time: <?= convertTime($event["start_time"]) ?></p>
    <p>End time: <?= convertTime($event["end_time"]) ?></p>
    <p>Date: <?= $event["date"] ?></p>

    <h4>Attendees:</h4>
    <!-- TODO: add functionality to remove attendee from event -->
    <ul class="list-group">
        <?php foreach ($attendees as $attendee) : ?>
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><?= $attendee["username"] ?></span>
                <a href="" class="btn btn-danger">Remove</a>
            </li>
        <?php endforeach ?>
    </ul>
</div>

<?php require basePath('views/partials/footer.php'); ?>
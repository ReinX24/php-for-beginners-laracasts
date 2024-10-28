<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="d-flex gap-2 mb-2">
        <a href="/event/edit?id=<?= $event['id'] ?>" class="btn btn-lg btn-primary">Edit</a>
        <a href="/event/delete?id=<?= $event['id'] ?>" class="btn btn-lg btn-danger">Delete</a>
    </div>

    <!-- Showing selected event info -->
    <h4>Location: <?= htmlspecialchars($event['place']); ?></h4>
    <p>Start time: <?= convertTime($event["start_time"]) ?></p>
    <p>End time: <?= convertTime($event["end_time"]) ?></p>
    <p>Date: <?= $event["date"] ?></p>

    <!-- TODO: add a search attendee by name, year_block_program -->

    <h4>Attendees:</h4>
    <a href="/attendee/add?id=<?= $event['id'] ?>" class="btn btn-lg btn-success mb-4">Add Attendee</a>
    <!-- TODO: add functionality to remove attendee from event -->
    <?php if (isset($attendees)) : ?>
        <ul class="list-group">
            <?php foreach ($attendees as $attendee) : ?>
                <!-- TODO: when clicking the link, show more info regarding the attendee -->
                <a href="#">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span><?= $attendee["username"] ?></span>
                        <a href="" class="btn btn-lg btn-danger">Remove</a>
                    </li>
                </a>
            <?php endforeach ?>
        </ul>
    <?php else : ?>
        <p>No attendees currently recorded.</p>
    <?php endif; ?>
</div>

<?php require basePath('views/partials/footer.php'); ?>
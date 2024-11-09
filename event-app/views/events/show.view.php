<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div class="d-flex gap-2 mb-2">
        <a href="/event/edit?id=<?= $event['id'] ?>" class="btn btn-lg btn-primary">Edit</a>
        <a href="/event/delete?id=<?= $event['id'] ?>" class="btn btn-lg btn-danger">Delete</a>
    </div>

    <hr>
    <!-- Showing selected event info -->
    <h4>Location: <?= htmlspecialchars($event['place']); ?></h4>
    <p>Start time: <?= convertTime($event["start_time"]) ?></p>
    <p>End time: <?= convertTime($event["end_time"]) ?></p>
    <p>Date: <?= $event["date"] ?></p>

    <hr>

    <form action="/event/search_attendees" method="GET">
        <div class="input-group input-group-lg mb-3">
            <!-- <input type="hidden" name="event_id" value="<?= ?>"> -->
            <input type="text" class="form-control" name="search_name" placeholder="Search by name">
            <button type="submit" class="btn btn-outline-primary">Search</button>
            <!-- <a href="/event/search_attendees?event_id=<?= $_GET["id"] ?>" class="btn btn-outline-primary">Search</a> -->
        </div>
    </form>

    <hr>
    <h4>Attendees:</h4>
    <a href="/attendee/add?id=<?= $event['id'] ?>" class="btn btn-lg btn-success mb-4">Add Attendee</a>
    <?php if (isset($attendees)) : ?>
        <div class="list-group">
            <?php foreach ($attendees as $attendee) : ?>
                <a href="/attendee?<?= http_build_query($attendee) ?>" class="list-group-item list-group-item-action fs-5">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?= $attendee["name"] ?></h5>
                        <!-- <small><?= $attendee["role"] ?></small> -->
                    </div>
                    <p class="mb-1"><?= $attendee["year_program_block"] ?></p>
                    <small><?= $attendee["time_in"] ?></small>
                </a>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <p>No attendees currently recorded.</p>
    <?php endif; ?>
</div>

<?php require basePath('views/partials/footer.php'); ?>
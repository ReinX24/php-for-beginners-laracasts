<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <!-- Showing selected event info -->
    <h4>Location: <?= htmlspecialchars($event['place']); ?></h4>
    <p>Start time: <?= convertTime($event["start_time"]) ?></p>
    <p>End time: <?= convertTime($event["end_time"]) ?></p>

    <h4>Attendees:</h4>
    <ul class="list-group">
        <li class="list-group-item">Jane Doe</li>
        <li class="list-group-item">John Doe</li>
        <li class="list-group-item">Jake Doe</li>
        <li class="list-group-item">Jillian Doe</li>
    </ul>
</div>

<?php require basePath('views/partials/footer.php'); ?>
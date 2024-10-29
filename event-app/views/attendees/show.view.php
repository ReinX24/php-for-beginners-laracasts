<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <p>Email: <?= $_GET["email"] ?></p>
    <p>Role: <?= $_GET["role"] ?></p>
    <p>Year, Program, and Block: <?= $_GET["year_program_block"] ?></p>
    <p>Time-in: <?= $_GET["time-in"] ?></p>

    <!-- TODO: add functionality to remove attendee from event -->
    <a href="" class="btn btn-lg btn-danger">Delete</a>
</div>

<?php require basePath('views/partials/footer.php'); ?>
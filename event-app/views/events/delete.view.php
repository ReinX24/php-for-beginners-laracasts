<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <h1>Are you sure you want to delete this event?</h1>

    <!-- TODO: finish delete functionality -->
    <form action=""></form>
    <a href="/event?id=<?= $_GET["id"] ?>" class="btn btn-secondary">Cancel</a>
</div>

<?php require basePath('views/partials/footer.php'); ?>
<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <h1>Are you sure you want to delete this event?</h1>

    <div class="d-flex gap-2">
        <form action="/event/delete" method="POST">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
        <a href="/event?id=<?= $_GET["id"] ?>" class="btn btn-secondary">Cancel</a>
    </div>
</div>

<?php require basePath('views/partials/footer.php'); ?>
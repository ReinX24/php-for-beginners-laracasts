<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container d-flex flex-column align-items-center">
    <p class="fs-3 text-center">Deleting current account will delete it all from recorded attendances, are you sure you want to delete your account?</p>

    <div class="d-flex gap-2">
        <form action="/account/destroy" method="POST">
            <button type="submit" class="btn btn-danger btn-lg">Delete</button>
        </form>
        <a href="/account" class="btn btn-secondary btn-lg">Cancel</a>
    </div>
</div>

<?php require basePath('views/partials/footer.php'); ?>
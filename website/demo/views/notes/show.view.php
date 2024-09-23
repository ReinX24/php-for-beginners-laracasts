<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<a href="/notes" class="btn btn-secondary mb-4">Go back</a>

<p><?= htmlspecialchars($note['body']); ?></p>

// TODO: resume @5:36:04
<a href="" class="btn btn-danger">Delete</a>

<?php basePath('view/partials/footer.php'); ?>
<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<a href="/notes" class="btn btn-secondary mb-4">Go back</a>

<p><?= htmlspecialchars($note['body']); ?></p>

<form action="/note" method="POST">
    <input type="hidden" name="_method" value="DELETE">
    <input type="hidden" name="id" value="<?= $note['id'] ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

<?php basePath('view/partials/footer.php'); ?>
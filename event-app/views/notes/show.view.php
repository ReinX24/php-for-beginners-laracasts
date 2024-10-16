<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>


<div class="container col-8 p-4">
    <a href="/notes" class="btn btn-secondary mb-4">Go back</a>

    <p><?= htmlspecialchars($note['body']); ?></p>

    <div class="d-flex gap-2">
        <a href="/note/edit?id=<?= $note['id']; ?>" class="btn btn-primary">Edit</a>

        <form action="/note" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value="<?= $note['id'] ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</div>

<?php basePath('view/partials/footer.php'); ?>
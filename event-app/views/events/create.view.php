<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <form action="/event/create" method="POST">
        <div class="mb-3">
            <label for="event-name" class="form-label">Event name</label>
            <input type="text" name="event-name" class="form-control" value="<?= $_POST['event-name'] ?? '' ?>">
        </div>

        <?php if (isset($errors['event-name'])) : ?>
            <p class="text-danger mt-2"><?= $errors['event-name'] ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php require basePath('views/partials/footer.php'); ?>
<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <form action="/event/create" method="POST">
        <div class="mb-3">
            <label for="event-name" class="form-label">Attendee Name</label>
            <input type="text" name="attendee-name" class="form-control" value="<?= $_POST['attendee-name'] ?? '' ?>">
        </div>

        <?php if (isset($errors['attendee-name'])) : ?>
            <p class="text-danger mt-2"><?= $errors['attendee-name'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="year-and-block" class="form-label">Year and Block (11 - ITE - 01)</label>
            <input type="text" name="year-and-block" class="form-control" value="<?= $_POST['year-and-block'] ?? '' ?>">
        </div>

        <?php if (isset($errors['year-and-block'])) : ?>
            <p class="text-danger mt-2"><?= $errors['year-and-block'] ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Add Attendee</button>
    </form>
</div>

<?php require basePath('views/partials/footer.php'); ?>
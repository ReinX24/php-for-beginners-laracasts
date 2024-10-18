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

        <div class="mb-3">
            <label for="start-time" class="form-label">Start time</label>
            <input type="time" name="start-time" class="form-control" value="<?= $_POST['start-time'] ?? '' ?>">
        </div>

        <?php if (isset($errors['start-time'])) : ?>
            <p class="text-danger mt-2"><?= $errors['start-time'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="end-time" class="form-label">End time</label>
            <input type="time" name="end-time" class="form-control" value="<?= $_POST['end-time'] ?? '' ?>">
        </div>

        <?php if (isset($errors['end-time'])) : ?>
            <p class="text-danger mt-2"><?= $errors['end-time'] ?></p>
        <?php endif; ?>

        <!-- TODO: add invalid time error -->
        <?php if (isset($errors['invalid-time'])) : ?>
            <p class="text-danger mt-2"><?= $errors['invalid-time'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="<?= $_POST['date'] ?? '' ?>">
        </div>

        <?php if (isset($errors['date'])) : ?>
            <p class="text-danger mt-2"><?= $errors['date'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="place" class="form-label">Place</label>
            <input type="date" name="place" class="form-control" value="<?= $_POST['place'] ?? '' ?>">
        </div>

        <?php if (isset($errors['place'])) : ?>
            <p class="text-danger mt-2"><?= $errors['place'] ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php require basePath('views/partials/footer.php'); ?>
<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <form action="/event/edit" method="POST">
        <input type="hidden" name="_method" value="PATCH">

        <div class="d-flex gap-2 mb-4">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="/events" class="btn btn-secondary">Cancel</a>
        </div>
        <div class="mb-3">
            <label for="event-name" class="form-label">Event name</label>
            <input type="text" name="event-name" class="form-control" value="<?= $event['event_name'] ?? '' ?>">
        </div>

        <?php if (isset($errors['event-name'])) : ?>
            <p class="text-danger mt-2"><?= $errors['event_name'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="start-time" class="form-label">Start time</label>
            <input type="time" name="start-time" class="form-control" value="<?= $event['start_time'] ?? '' ?>">
        </div>

        <?php if (isset($errors['start-time'])) : ?>
            <p class="text-danger mt-2"><?= $errors['start_time'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="end-time" class="form-label">End time</label>
            <input type="time" name="end-time" class="form-control" value="<?= $event['end_time'] ?? '' ?>">
        </div>

        <?php if (isset($errors['end-time'])) : ?>
            <p class="text-danger mt-2"><?= $event['end-time'] ?></p>
        <?php endif; ?>

        <?php if (isset($errors['invalid-time'])) : ?>
            <p class="text-danger mt-2"><?= $errors['invalid-time'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" name="date" class="form-control" value="<?= $event['date'] ?? '' ?>">
        </div>

        <?php if (isset($errors['date'])) : ?>
            <p class="text-danger mt-2"><?= $errors['date'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="place" class="form-label">Place</label>
            <input type="text" name="place" class="form-control" value="<?= $event['place'] ?? '' ?>">
        </div>

        <?php if (isset($errors['place'])) : ?>
            <p class="text-danger mt-2"><?= $errors['place'] ?></p>
        <?php endif; ?>
    </form>
</div>
</div>

<?php require basePath('views/partials/footer.php'); ?>
<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <form action="/attendee/update" method="POST" class="mb-2">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>">

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= old("username") ?>">
        </div>

        <?php if (!empty(error("username"))) : ?>
            <p class="text-danger mt-2"><?= error("username") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= old("email") ?>">
        </div>

        <?php if (!empty(error("email"))) : ?>
            <p class="text-danger mt-2"><?= error("email") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="role" name="role" id="role" class="form-control" value="<?= old("role") ?>">
        </div>

        <?php if (!empty(error("role"))) : ?>
            <p class="text-danger mt-2"><?= error("role") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="year_program_block" class="form-label">Year, Program, and Block (11 - ITE - 01)</label>
            <input type="text" name="year_program_block" id="year_program_block" class="form-control" value="<?= old("year_program_block") ?>">
        </div>

        <?php if (!empty(error("year_program_block"))) : ?>
            <p class="text-danger mt-2"><?= error("year_program_block") ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Add Attendee</button>
    </form>
</div>

<?php require basePath('views/partials/footer.php'); ?>
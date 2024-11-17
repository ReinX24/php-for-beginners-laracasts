<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container mb-4">
    <div class="alert alert-info" role="alert">
        Updating Account will log you out!
    </div>
    <form action="/account/update" method="POST" class="mb-2">
        <input type="hidden" name="_method" value="PATCH">

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= old("username", $_SESSION["user"]["username"]) ?>">
        </div>

        <?php if (!empty(error("username"))) : ?>
            <p class="text-danger mt-2"><?= error("username") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= old("email", $_SESSION["user"]["email"]) ?>">
        </div>

        <?php if (!empty(error("email"))) : ?>
            <p class="text-danger mt-2"><?= error("email") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="year_program_block" class="form-label">Year, Program, and Block (11 - ITE - 01)</label>
            <input type="text" name="year_program_block" id="year_program_block" class="form-control" value="<?= old("year_program_block", $_SESSION["user"]["year_program_block"]) ?>">
        </div>

        <?php if (!empty(error("year_program_block"))) : ?>
            <p class="text-danger mt-2"><?= error("year_program_block") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="password" class="form-label">Password (needed to update account information)</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Enter password again to confirm</label>
            <input type="password" name="confirmPassword" class="form-control">
        </div>

        <?php if (!empty(error("enteredPassword"))) : ?>
            <p class="text-danger mt-2"><?= error("enteredPassword") ?></p>
        <?php endif; ?>

        <?php if (!empty(error("confirmPassword"))) : ?>
            <p class="text-danger mt-2"><?= error("confirmPassword") ?></p>
        <?php endif; ?>

        <?php if (!empty(error("incorrectPassword"))) : ?>
            <p class="text-danger mt-2"><?= error("incorrectPassword") ?></p>
        <?php endif; ?>

        <div class="d-flex justify-content-center gap-2">
            <button type=" submit" class="btn btn-outline-success btn-lg">Update Account</button>
            <a href="/account" class="btn btn-secondary btn-lg">Cancel</a>
        </div>
    </form>

    <div class="d-flex justify-content-center">
        <a href="/account/change_password" class="btn btn-primary btn-lg">Change Password</a>
    </div>
</div>

<?php require basePath('views/partials/footer.php'); ?>
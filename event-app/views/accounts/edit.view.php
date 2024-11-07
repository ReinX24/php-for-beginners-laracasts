<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <form action="/account/update" method="POST" class="mb-2">
        <input type="hidden" name="_method" value="PATCH">

        <?php
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
        ?>

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
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <?php if (!empty(error("enteredPassword"))) : ?>
            <p class="text-danger mt-2"><?= error("enteredPassword") ?></p>
        <?php endif; ?>

        <?php if (!empty(error("incorrectPassword"))) : ?>
            <p class="text-danger mt-2"><?= error("incorrectPassword") ?></p>
        <?php endif; ?>

        <button type=" submit" class="btn btn-primary">Update Account</button>
    </form>
</div>

<?php require basePath('views/partials/footer.php'); ?>
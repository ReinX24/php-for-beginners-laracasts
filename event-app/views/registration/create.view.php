<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<div class="container col-8 p-4">
    <h1 class="text-center">Register</h1>
    <p class="text-center">Register for a new account.</p>

    <form action="/register" method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" name="username" class="form-control" value="<?= old("username"); ?>">
        </div>

        <?php if (isset($errors['name'])) : ?>
            <p class="text-danger"><?= $errors['name']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" value="<?= old("email"); ?>">
        </div>

        <?php if (isset($errors['email'])) : ?>
            <p class="text-danger"><?= $errors['email']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="year-program-block" class="form-label">Year, Program, and Block (ex. 11-ITE-01)</label>
            <input type="text" name="year-program-block" class="form-control" value="<?= old("year-program-block"); ?>">
        </div>

        <?php if (isset($errors['year-program-block'])) : ?>
            <p class="text-danger"><?= $errors['year-program-block']; ?></p>
        <?php endif ?>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>

        <?php if (isset($errors['password'])) : ?>
            <p class="text-danger"><?= $errors['password']; ?></p>
        <?php endif ?>

        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>

</div>

<?php basePath('view/partials/footer.php'); ?>
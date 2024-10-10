<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<div class="container col-8 p-4">
    <h1 class="text-center">Register</h1>
    <p class="text-center">Register for a new account.</p>

    <form action="/register" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" name="email" class="form-control" value="<?= old("email"); ?>">
        </div>

        <?php if (isset($errors['email'])) : ?>
            <p class="text-danger"><?= $errors['email']; ?></p>
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
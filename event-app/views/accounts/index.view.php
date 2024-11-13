<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-md">
    <div class="d-flex flex-column align-items-center">
        <p><?= $_SESSION["user"]["username"] ?></p>
        <p><?= $_SESSION["user"]["email"] ?></p>
        <p><?= $_SESSION["user"]["year_program_block"] ?></p>
    </div>

    <div class="d-flex justify-content-center gap-2">
        <a href="/account/edit" class="btn btn-secondary">Edit Account</a>
        <a href="/account/delete" class="btn btn-danger">Delete Account</a>
    </div>

    <div class="d-flex flex-column align-items-center">
        <img src="<?= $qrPath ?>" alt="qrcode">
        <a href="/account/downloadqr" class="btn btn-primary">Download</a>
    </div>

</div>

<?php require basePath('views/partials/footer.php'); ?>
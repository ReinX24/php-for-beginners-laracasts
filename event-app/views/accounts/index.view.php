<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <p><?= $_SESSION["user"]["username"] ?></p>
    <p><?= $_SESSION["user"]["email"] ?></p>
    <p><?= $_SESSION["user"]["year_program_block"] ?></p>

    <!-- <img src="<?= $qrcode ?>" alt=""> -->
    <!-- TODO: change image path, currently in public -->
    <img src="<?= "qrcode.png" ?>" alt="QR CODE HERE">
</div>

<?php require basePath('views/partials/footer.php'); ?>
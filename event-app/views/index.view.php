<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php'; ?>

<?php require 'partials/banner.php'; ?>

<div class="container col-8 p-4">
    <p>Hello, <?= $_SESSION['user']['email'] ?? 'Guest' ?>. Welcome to the home page.</p>
    <?php
        echo "<pre>";
        var_dump($_SESSION);
        echo "</pre>";
    ?>
</div>

<?php require 'partials/footer.php'; ?>
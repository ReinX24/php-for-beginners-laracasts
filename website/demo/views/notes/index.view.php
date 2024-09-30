<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>


<div class="container col-8 p-4">
    <p>Hello. Welcome to the notes page.</p>

    <ul>
        <?php foreach ($notes as $note) : ?>
            <li>
                <a href="/note?id=<?= $note['id']; ?>"
                    class="link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                    <!-- htmlspecialchars escape special characters -->
                    <?= htmlspecialchars($note['body']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <a href="/note/create" class="btn btn-primary">Create Note</a>
</div>

<?php basePath('view/partials/footer.php'); ?>
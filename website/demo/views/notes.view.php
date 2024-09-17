<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php'; ?>

<?php require 'partials/banner.php'; ?>

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

<?php require 'partials/footer.php'; ?>
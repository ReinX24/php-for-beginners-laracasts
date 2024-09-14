<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php'; ?>

<?php require 'partials/banner.php'; ?>

<p>Hello. Welcome to the notes page.</p>

<ul>
    <?php foreach ($notes as $note) : ?>
        <li>
            <a href="/note?id=<?= $note['id']; ?>"
                class="link-underline link-underline-opacity-0 link-underline-opacity-100-hover">
                <?= $note['body']; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<?php require 'partials/footer.php'; ?>
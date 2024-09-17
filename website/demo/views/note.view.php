<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php'; ?>

<?php require 'partials/banner.php'; ?>

<a href="/notes" class="btn btn-secondary mb-4">Go back</a>
<p><?= htmlspecialchars($note['body']); ?></p>

<?php require 'partials/footer.php'; ?>
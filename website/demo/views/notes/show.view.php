<?php require 'views/partials/head.php'; ?>

<?php require 'views/partials/nav.php'; ?>

<?php require 'views/partials/banner.php'; ?>

<a href="/notes" class="btn btn-secondary mb-4">Go back</a>
<p><?= htmlspecialchars($note['body']); ?></p>

<?php require 'views/partials/footer.php'; ?>
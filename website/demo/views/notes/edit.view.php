<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container col-8 p-4">
    <!-- Form for creating a note -->
    <form action="/note" method="POST">
        <!-- Note id and request method -->
        <input type="hidden" name="id" value="<?= $note['id']; ?>">
        <input type="hidden" name="_method" value="PATCH">

        <!-- Note body text -->
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" class="form-control" id="body" placeholder="Here's an idea for a note..." style="height:100px;"><?= $note['body'] ?? ""; ?></textarea>

            <?php if (isset($errors['body'])) : ?>
                <p class="text-danger mt-2"><?= $errors['body'] ?></p>
            <?php endif; ?>
        </div>

        <div class="d-flex gap-2 justify-content-end">
            <a href="/notes" class="btn btn-secondary">Cancel</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>

    </form>
</div>

<?php basePath('view/partials/footer.php'); ?>
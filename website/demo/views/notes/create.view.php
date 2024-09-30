<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>


<div class="container col-8 p-4">
    <!-- Form for creating a note -->
    <form action="/note" method="POST">
        <!-- Note body text -->
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <textarea name="body" class="form-control" id="body" placeholder="Here's an idea for a note..." style="height:100px;"><?= $_POST['body'] ?? ""; ?></textarea>

            <?php if (isset($errors['body'])) : ?>
                <p class="text-danger mt-2"><?= $errors['body'] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<?php basePath('view/partials/footer.php'); ?>
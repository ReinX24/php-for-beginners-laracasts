<?php require 'partials/head.php'; ?>

<?php require 'partials/nav.php'; ?>

<?php require 'partials/banner.php'; ?>

<!-- Form for creating a note -->
<form action="/note/create" method="POST">
    <!-- Note body text -->
    <div class="mb-3">
        <label for="body" class="form-label">Body</label>
        <textarea name="body" class="form-control" id="body" placeholder="Here's an idea for a note..." style="height:100px;"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

<?php require 'partials/footer.php'; ?>
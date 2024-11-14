<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container mb-4">
    <div class="alert alert-info fs-4 mt-4" role="alert">
        Changing Password will log you out!
    </div>

    <form action="/account/update_password" method="POST">
        <input type="hidden" name="_method" value="PATCH">
        <div class="mb-3">
            <label for="password" class="form-label fs-4">Current Password</label>
            <input type="password" name="password" class="form-control form-control-lg">
        </div>

        <div class="mb-3">
            <label for="reenter_password" class="form-label fs-4">Re-enter Current Password</label>
            <input type="password" name="reenter_password" class="form-control form-control-lg">
        </div>

        <div class="mb-3">
            <label for="new_password" class="form-label fs-4">New Password</label>
            <input type="password" name="new_password" class="form-control form-control-lg">
        </div>

        <div class="mb-3">
            <label for="reenter_new_password" class="form-label fs-4">Re-enter New Password</label>
            <input type="password" name="reenter_new_password" class="form-control form-control-lg">
        </div>

        <div class="d-flex justify-content-center gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Change Password</button>
            <a href="/account" class="btn btn-secondary btn-lg">Cancel</a>
        </div>
    </form>

</div>

<?php require basePath('views/partials/footer.php'); ?>
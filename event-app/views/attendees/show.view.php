<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <p>ID: <?= $_GET["user_id"] ?></p>
    <p>Email: <?= $_GET["email"] ?></p>
    <p>Role: <?= $_GET["role"] ?></p>
    <p>Year, Program, and Block: <?= $_GET["year_program_block"] ?></p>
    <p>Time-in: <?= $_GET["time_in"] ?></p>

    <?php if (!empty(error("event_id"))) : ?>
        <p class="text-danger mt-2"><?= error("event_id") ?></p>
    <?php endif; ?>

    <?php if (!empty(error("user_id"))) : ?>
        <p class="text-danger mt-2"><?= error("user_id") ?></p>
    <?php endif; ?>

    <?php if (!empty(error("attendance_id"))) : ?>
        <p class="text-danger mt-2"><?= error("attendance_id") ?></p>
    <?php endif; ?>

    <a href="/event?id=<?= $_GET["event_id"] ?>" class="btn btn-secondary btn-lg">Back</a>
    <!-- <a href="/attendee/delete?id=<?= $_GET["id"] ?>" class="btn btn-lg btn-danger">Delete</a> -->

    <!-- Button trigger delete modal -->
    <button type="button" class="btn btn-danger btn-lg" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Delete
    </button>

    <!-- Delete modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Attendee</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Are you sure you want to delete this attendee?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Cancel</button>
                    <form action="/attendee/destroy" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="event_id" value="<?= $_GET["event_id"] ?>">
                        <input type="hidden" name="user_id" value="<?= $_GET["user_id"] ?>">
                        <input type="hidden" name="attendance_id" value="<?= $_GET["id"] ?>">

                        <button type="submit" class="btn btn-danger btn-lg">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<?php require basePath('views/partials/footer.php'); ?>
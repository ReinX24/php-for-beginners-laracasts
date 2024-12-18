<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container container-md pb-4">
    <div class="d-grid gap-2 d-md-block gap-2 mb-2">
        <a href="/event/edit?id=<?= $event['id'] ?>" class="btn btn-lg btn-primary">Edit</a>
        <a href="/event/delete?id=<?= $event['id'] ?>" class="btn btn-lg btn-danger">Delete</a>
    </div>

    <hr>
    <!-- Showing selected event info -->
    <p class="fs-4"><span class="fw-semibold">Location:</span> <?= htmlspecialchars($event['place']); ?></p>
    <p class="fs-4"><span class="fw-semibold">Start time:</span> <?= convertTime($event["start_time"]) ?></p>
    <p class="fs-4"><span class="fw-semibold">End time:</span> <?= convertTime($event["end_time"]) ?></p>
    <p class="fs-4"><span class="fw-semibold">Date:</span> <?= convertDate($event["date"]) ?></p>

    <hr>
    <!-- Search by name -->
    <form action="/event/search_attendees" method="GET">
        <div class="input-group input-group-lg mb-3">
            <input type="text" class="form-control" name="search_name" placeholder="Search by name" value="<?= $search_query ?? "" ?>">
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>

    <!-- Search by year course and block -->
    <form action="/event/sort_attendees_year_program_block" method="GET">
        <div class="input-group input-group-lg mb-3">
            <select class="form-select" name="year_program_block">
                <option value="all" selected>All</option>
                <?php foreach ($yearProgramBlockChoices as $data) : ?>
                    <option value="<?= $data["year_program_block"] ?>"
                        <?= isset($selectedYearProgramBlock)
                            &&
                            $selectedYearProgramBlock
                            ===
                            $data["year_program_block"] ? "selected" : "" ?>>
                        <?= $data["year_program_block"] ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </div>
    </form>

    <!-- Changes order from latest to oldest and vice-versa -->
    <form action="/event/sort_attendees_time" method="GET">
        <div class="input-group input-group-lg mb-3">
            <select class="form-select" name="sort_select" id="sort_select">
                <option value="descending" <?= isset($_GET["sort_select"]) && $_GET["sort_select"] === "descending" ? "selected" : "" ?>>Descending (Latest to Oldest)</option>
                <option value="ascending" <?= isset($_GET["sort_select"]) && $_GET["sort_select"] === "ascending" ? "selected" : "" ?>>Ascending (Oldest to Latest)</option>
            </select>
            <input type="hidden" name="id" value="<?= $_GET["id"] ?>">
            <button type="submit" class="btn btn-outline-primary">Sort Time</button>
        </div>
    </form>

    <!-- TODO: search using all queries -->
    <form action="" class="d-grid mb-2">
        <button type="submit" class="btn btn-outline-success btn-lg">Search</button>
    </form>

    <!-- TODO: reset all queries and the entire page -->
    <form action="/event/reset" class="d-grid">
        <button type="submit" class="btn btn-outline-danger btn-lg">Reset</button>
    </form>

    <hr>
    <h4>Attendees:</h4>
    <a href="/attendee/add?id=<?= $event['id'] ?>" class="btn btn-lg btn-success mb-4">Add Attendee</a>
    <?php if (isset($attendees)) : ?>
        <div class="list-group">
            <?php foreach ($attendees as $attendee) : ?>
                <a href="/attendee?<?= http_build_query($attendee) ?>" class="list-group-item list-group-item-action fs-5">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1"><?= $attendee["name"] ?></h5>
                        <!-- <small><?= $attendee["role"] ?></small> -->
                    </div>
                    <p class="mb-1"><?= $attendee["year_program_block"] ?></p>
                    <!-- TODO: format time in -->
                    <small><?= convertTimeIn($attendee["time_in"]) ?></small>
                </a>
            <?php endforeach ?>
        </div>
    <?php else : ?>
        <p>No attendees currently recorded.</p>
    <?php endif; ?>
</div>

<?php require basePath('views/partials/footer.php'); ?>
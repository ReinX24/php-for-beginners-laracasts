<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">
    <div id="reader">
    </div>

    <form action="/event/create" method="POST">
        <div class="mb-3">
            <label for="event-name" class="form-label">Attendee Name</label>
            <input type="text" name="attendee-name" class="form-control" value="<?= $_POST['attendee-name'] ?? '' ?>">
        </div>

        <?php if (isset($errors['attendee-name'])) : ?>
            <p class="text-danger mt-2"><?= $errors['attendee-name'] ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="year-and-block" class="form-label">Year and Block (11 - ITE - 01)</label>
            <input type="text" name="year-and-block" class="form-control" value="<?= $_POST['year-and-block'] ?? '' ?>">
        </div>

        <?php if (isset($errors['year-and-block'])) : ?>
            <p class="text-danger mt-2"><?= $errors['year-and-block'] ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Add Attendee</button>
    </form>
</div>

<script>
    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        console.log(`Code matched = ${decodedText}`, decodedResult);

        // Parses the json from the qr code
        const userInfo = JSON.parse(decodedText);
        console.log(userInfo);
        // document.querySelector("#username").textContent = userInfo.username;

        // html5QrcodeScanner.clear();
        // ^ this will stop the scanner (video feed) and clear the scan area.
    }

    function onScanFailure(error) {
        // handle scan failure, usually better to ignore and keep scanning.
        // for example:
        console.warn(`Code scan error = ${error}`);
    }

    let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader", {
            fps: 10,
            qrbox: {
                width: window.innerWidth * 0.60,
                height: window.innerHeight * 0.25
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<?php require basePath('views/partials/footer.php'); ?>
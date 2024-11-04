<?php require basePath('views/partials/head.php'); ?>

<?php require basePath('views/partials/nav.php'); ?>

<?php require basePath('views/partials/banner.php'); ?>

<div class="container">

    <p>Scan QR Code</p>
    <div id="reader" class="mb-4"></div>

    <form action="/attendee/add" method="POST" class="mb-2">
        <input type="hidden" name="event_id" value="<?= $_GET["id"] ?>">
        <input type="hidden" id="user_id" name="user_id" , value="<?= old("user_id") ?>">

        <?php if (!empty(error("user_already_attended_error"))) : ?>
            <p class="text-danger mt-2"><?= error("user_already_attended_error") ?></p>
        <?php endif; ?>

        <?php if (!empty(error("event_not_found_error"))) : ?>
            <p class="text-danger mt-2"><?= error("event_not_found_error") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control" value="<?= old("username") ?>">
        </div>

        <?php if (!empty(error("username"))) : ?>
            <p class="text-danger mt-2"><?= error("username") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="<?= old("email") ?>">
        </div>

        <?php if (!empty(error("email"))) : ?>
            <p class="text-danger mt-2"><?= error("email") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="role" class="form-label">Role</label>
            <input type="role" name="role" id="role" class="form-control" value="<?= old("role") ?>">
        </div>

        <?php if (!empty(error("role"))) : ?>
            <p class="text-danger mt-2"><?= error("role") ?></p>
        <?php endif; ?>

        <div class="mb-3">
            <label for="year_program_block" class="form-label">Year, Program, and Block (11 - ITE - 01)</label>
            <input type="text" name="year_program_block" id="year_program_block" class="form-control" value="<?= old("year_program_block") ?>">
        </div>

        <?php if (!empty(error("year_program_block"))) : ?>
            <p class="text-danger mt-2"><?= error("year_program_block") ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Add Attendee</button>
    </form>
</div>

<script>
    const detectDeviceType = () =>
        /Mobile|Android|iPhone|iPad/i.test(navigator.userAgent) ?
        'Mobile' :
        'Desktop';

    let scannerWidth = 0;
    let scannerHeight = 0;

    if (detectDeviceType() === "Mobile") {
        scannerWidth = 200;
        scannerHeight = 200;
    } else {
        scannerWidth = 500;
        scannerHeight = 500;
    }
    // 'Mobile' or 'Desktop'

    function onScanSuccess(decodedText, decodedResult) {
        // handle the scanned code as you like, for example:
        // console.log(`Code matched = ${decodedText}`, decodedResult);

        // Parses the json from the qr code
        const userInfo = JSON.parse(decodedText);

        document.querySelector("#user_id").value = userInfo.id;
        document.querySelector("#username").value = userInfo.username;
        document.querySelector("#email").value = userInfo.email;
        document.querySelector("#role").value = userInfo.role;
        document.querySelector("#year_program_block").value = userInfo.year_program_block;
        console.log(userInfo);

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
                width: scannerWidth,
                height: scannerHeight
            }
        },
        /* verbose= */
        false);
    html5QrcodeScanner.render(onScanSuccess, onScanFailure);
</script>

<?php require basePath('views/partials/footer.php'); ?>
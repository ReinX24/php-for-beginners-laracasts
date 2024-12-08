<!-- TODO: change the design of the navbar -->
<div class="container">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <div class="col-md-3 mb-2 mb-md-0">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <span class="fs-4">EventU</span>
            </a>
        </div>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0 nav-pills">
            <li class="nav-item">
                <a class="nav-link
                        <?= urlIs('/') ? "active" : "" ?>
                    " href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link
                        <?= urlIs('/about') ? "active" : "" ?>
                    " href="/about">About</a>
            </li>
            <?php if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] === "admin") : ?>
                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/events') ? "active" : "" ?>
                    " href="/events">Events</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/account') ? "active" : "" ?>
                    " href="/account">Account</a>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION["user"]["role"]) && $_SESSION["user"]["role"] === "user") : ?>
                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/account') ? "active" : "" ?>
                    " href="/account">Account</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link
                        <?= urlIs('/contact') ? "active" : "" ?>
                    " href="/contact">Contact</a>
            </li>
        </ul>

        <div class="col-md-3 text-end">
            <div class="ms-auto d-flex align-items-center gap-2">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <p class="p-0 m-0"><?= $_SESSION['user']['email']; ?></p>
                    <form action="/session" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Logout</button>
                    </form>
                <?php else : ?>
                    <a href="/login" class="btn btn-primary">Login</a>
                    <a href="/register" class="btn btn-secondary">Register</a>
                <?php endif ?>
            </div>
        </div>
    </header>
</div>
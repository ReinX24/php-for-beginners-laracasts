<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Router Enterprises</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mb-2 mb-md-0">
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
                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/notes') ? "active" : "" ?>
                    " href="/notes">Notes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link
                        <?= urlIs('/contact') ? "active" : "" ?>
                    " href="/contact">Contact</a>
                </li>
            </ul>

            <div class="ms-auto d-flex align-items-center">
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <p class="text-light p-0 m-0"><?= $_SESSION['user']['email']; ?></p>
                <?php else : ?>
                    <a href="/register" class="text-light link-underline link-underline-opacity-0">Register</a>
                <?php endif ?>
            </div>
        </div>
    </div>
</nav>
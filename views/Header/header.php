<nav class="navbar navbar-expand-lg navbar-light nav-bar">
    <a class="navbar-brand" href="#">Navbar</a>
    <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['UID'])) { ?>
        <li class="nav-item active">
            <a class="nav-link" href="/home">Home <span class="sr-only">(current)</span></a>
        </li>
        <?php } else { ?>
        <li class="nav-item active">
            <a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
        </li>
        <?php } ?>
    </ul>
</nav>
<nav class="navbar navbar-expand-lg navbar-light nav-bar">
  <a class="navbar-brand" href="/home">Navbar</a>
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
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Admin Functions
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="/admin/accountlist">Account List</a>
      </div>
    </li>
  </ul>
</nav>

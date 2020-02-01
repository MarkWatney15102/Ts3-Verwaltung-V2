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
    <?php if (isset($_SESSION['UID'])) { ?>
      <li class="nav-item active">
        <a class="nav-link" href="/channel/list">Channel List</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" param="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin Functions
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/admin/accountlist">Account List</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/logout">Logout</a>
      </li>
      <?php if ($this->config->permissions->checkElementAccess(100)) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" param="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Systemadmin
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <div class="col-lg-12" style="text-align: center">
              Database Name 
              <br>
              <?= $this->config->getDatabaseName(); ?>
              <br>
              <hr>
              PHP Version
              <br>
              <?= $this->config->getPhpVersion(); ?>
            </div>
          </div>
        </li>
      <?php } ?>
    <?php } ?>
  </ul>
</nav>

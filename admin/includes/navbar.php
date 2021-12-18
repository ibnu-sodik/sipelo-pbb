
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand ps-3" href="<?= base_url('admin') ?>">SiPeLang</a>

  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0 mr-10" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>

  <div class="collapse navbar-collapse navbar-nav ms-auto ms-md-0 me-3 me-lg-4" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
         <?= $user_data['username']; ?>
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="logout.php">Keluar</a>
      </div>
    </li>
  </ul>
</div>
</nav>
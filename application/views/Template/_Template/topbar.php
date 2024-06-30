<nav class="main-header navbar navbar-expand navbar-white navbar-light">

  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-left">

          <div class="dropdown-item">
            <div class="media">
              <div class="media-body">
                <i class="fas fa-user mr-2"></i>
                <?php foreach ($user as $value) { ?>
                  <strong><?= $value->nama; ?></strong>
                <?php } ?>
                <a href="<?= base_url('Main/confirm/')?>" class="btn bg-navy col-5 text-xs ml-5"><b>Ubah Profil</b></a>
                <!-- <p class="text-sm mr-2 mt-0">Apoteker</p> -->
              </div>
            </div>
          </div>

        </div>
      </li>
  </ul>

  <ul class="navbar-nav ml-auto">

    <li class="nav-item">
      <a href="<?=base_url('Main/logout');?>">
        <button type="button" class="btn btn-outline-secondary text-xs" onclick="return confirm('Yakin ingin logout?')" style="margin-right:10px;">
          <span style="margin-right:2px;" class="text-sm">Logout</span>
          <i class="fas fa-caret-right"></i>
        </button>
      </a>
    </li>

  </ul>

</nav>
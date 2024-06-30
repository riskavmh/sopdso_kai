<aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
  <a href="<?=base_url('Main');?>" class="brand-link">
    <img src="<?=base_url('assets');?>/img/logo_kai_bw.png" alt="LogoKAI" class="brand-image mt-2" style="width: 32px; opacity: 0.8;" >
    <span style="font-size: 13px; margin-left: 5px;"><strong>Apotek PT KAI Daop 9</strong></span>
  </a>

  <div class="sidebar">
    <a href="<?=base_url('Main');?>">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <i class="mt-2 fas fa-user nav-icon" style="color: white; opacity: 0.8;"></i>
      </div>
      <div class="info">
        <?php foreach ($user as $value) { ?>
        <span class="d-block font-weight-bold"><?= $value->nama; ?></span>
        <?php } ?>
      </div>
    </div>
    </a>

    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class=" nav-item">
          <a href="<?=base_url('Obat_c');?>" class="nav-link <?php echo ($active=='obat')?"active":""; ?>">
            <i class="fas fa-pills nav-icon"></i>
            <p>Data Obat</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=base_url('Kdl_c');?>" class="nav-link <?php echo ($active=='kdl')?"active":""; ?>">
            <i class="fas fa-calendar-alt nav-icon"></i>
            <p>Kedaluwarsa Obat</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?=base_url('Anl_c');?>" class="nav-link <?php echo ($active=='anl')?"active":""; ?>">
            <i class="fas fa-clipboard-list nav-icon"></i>
            <p>Analisis RAB</p>
          </a>
        </li>

        <li class="nav-item">
        <a href="<?=base_url('Prd_c');?>" class="nav-link <?php echo ($active=='prd')?"active":""; ?>">
          <i class="fas fa-chart-area nav-icon"></i>
          <p>Prediksi Kebutuhan</p>
        </a>
      </li>

    </nav>
  </div>

</aside>

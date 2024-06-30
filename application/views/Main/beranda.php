<div class="container-fluid">
  <div class="row">

    <div class="col-12">

      <div class="callout callout-info">
        <?php foreach ($user as $value) { ?>
        <h6><i class="fas fa-sun"></i>&nbsp;Hai, <strong><?= $value->nama; ?></strong>.</h6>
        <?php } ?>
        <!-- <a href="<?= base_url('Main/confirm/')?>">Ganti Password</a> -->
      </div>

      <!-- <a href="<?= base_url('Main/confirm/')?>" class="btn bg-navy btn-block col-2"><b>Ganti Password</b></a> -->
    </div>

  </div>

   <div class="row mt-2">

    <div class="col-12 col-sm-6 col-md-3">
      <a href="<?=base_url('Obat_c');?>">
        <div class="info-box">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-pills" style="color: white;"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Data Obat</strong></span>
            <!-- <span class="info-box-number">
              10
              <small>%</small>
            </span> -->
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <a href="<?=base_url('Kdl_c');?>">
        <div class="info-box">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-calendar-alt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Kedaluwarsa Obat</strong></span>
          </div>
        </div>
      </a>
    </div>
    
    <div class="col-12 col-sm-6 col-md-3">
      <a href="<?=base_url('Anl_c');?>">
        <div class="info-box">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-clipboard-list"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Analisis RAB</strong></span>
          </div>
        </div>
      </a>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <a href="<?=base_url('Prd_c');?>">
        <div class="info-box">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-chart-area"></i></span>
          <div class="info-box-content">
            <span class="info-box-text"><strong>Prediksi Kebutuhan</strong></span>
          </div>
        </div>
      </a>
    </div>
  </div>

  <div class="row mt-3">

    <div class="col-md-6 ml-5 mr-3">

      <?php //foreach ($user as $value) { ?>
      <div class="card card-outline" style="height: 300px;">
        <!-- <div class="card-header">
          <div class="card-tools">

            <button type="button" class="btn btn-sm" data-card-widget="collapse" style="color: grey;">
              <i class="fas fa-minus"></i>
            </button>

            <button type="button" class="btn btn-sm" data-card-widget="remove" style="color: grey;">
              <i class="fas fa-times"></i>
            </button>

          </div>
        </div> -->

        <div class="card-body box-profile">
          <div class="text-center">
            <!-- <img class="profile-user-img img-fluid img-circle"
                 src="../../dist/img/user4-128x128.jpg"
                 alt="User profile picture"> -->
                 <i class="fas fa-user text-lg"></i>
          </div>

          <h3 class="profile-username text-center">
            
            <!-- <?php //echo $value->nama; ?> -->
            Ovilia Maharani, S. Farm., Apt.
            
          </h3>

          <p class="text-center">
            <!-- <?php //echo ucwords($value->role); ?> -->
            Apoteker
            </p>

          <a href="<?= base_url('Main/confirm/')?>" class="btn bg-dark btn-block"><b>Ubah Password</b></a>
        </div>

        <hr>

        <div class="card-body col-12">
          <div class="row">

            <div class="col-6 mt-2">
              <div class="row">
                <div class="col-2">
                  <strong>
                    <!-- <i class="fas fa-pencil-alt mr-1"></i> -->
                    SIA
                  </strong>
                  <br><hr>
                  <strong>
                    <!-- <i class="fas fa-book mr-1"></i>  -->
                    SIPA
                  </strong>
                </div>
                <div>
                  : 
                  <br><hr>
                  : 
                </div>
                <div class="col-8">
                  503/A.1/SIA/0013.B/35.09.325/2019
                  <br><hr>
                  503/A.1/SIA/0013.B/35.09.325/2019
                </div>
              </div>
            </div>

            <div class="col-6">
              <strong><i class="fas fa-clock mr-1"></i>
                JAM PRAKTIK :
              </strong>
              <div class="row ml-3">
                <div class="col-5">
                  SENIN - KAMIS
                  <br>
                  JUMAT
                  <br>
                  SABTU
                </div>
                <div>
                  :
                  <br>
                  : 
                  <br>
                  : 
                </div>
                <div class="col-5">
                  07.15 - 14.00
                  <br>
                  07.15 - 11.00
                  <br>
                  07.15 - 13.00
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
      <?php //} ?>
    </div>

    <div class="card bg-gradient col-5 ml-3" style="height: 300px;">
      <div class="card-header border-0 mt-1 mb-2">

        <h3 class="card-title">
          <i class="far fa-calendar-alt"></i>
          Kalender
        </h3>

        <!-- <div class="card-tools">

          <button type="button" class="btn btn-sm" data-card-widget="collapse" style="color: grey;">
            <i class="fas fa-minus"></i>
          </button>

          <button type="button" class="btn btn-sm" data-card-widget="remove" style="color: grey;">
            <i class="fas fa-times"></i>
          </button>

        </div> -->

      </div>
      <div class="card-body pt-0">
        <div id="calendar" style="width: 100%"></div>
      </div>
    </div>


    </div>

</div>
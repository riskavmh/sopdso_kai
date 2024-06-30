<div class="container-fluid">

  <div class="card col-12">
    <div class="row">
      <div class="col-4">
      </div>

      <div class="col-4">
        <div class="card-body">

          <button type="button" class="btn btn-outline-dark col-12" data-toggle="modal" data-target="#modal-default">
            Cara Penggunaan Halaman
          </button>
          
        </div>
      </div>

      <div class="col-4">
      </div>
    
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header col-12">
          <h4 class="mt-3 card-title text-bold col-4"><?= $page ?></h4>

          <span class="card-title text-sm col-3 mt-1">
            <!-- <label>Bulan dan Tahun*</label> -->
            <form action="<?= base_url('Prd_c'); ?>" method="POST">
              <div class="input-group date" id="reservationdate1" data-target-input="nearest">

                <?php
                  $now = date('m-Y');
                  foreach ($prd as $baris) {
                    foreach ($tampil as $key => $value) {
                ?>
                <a href="<?= ($value == null) ? base_url('Prd_c/delete_bulan/').$now : base_url('Prd_c/delete_bulan/').$value ?>" onclick="return confirm('Yakin hapus semua data pada bulan yang sudah dipilih?')">
                  <button type="button" class="btn btn-outline-secondary text-bold text-lg float-left mr-3" title="Hapus semua data pada bulan yang ditampilkan"><i class="fas fa-trash-alt text-bold"></i></button>
                </a>
              <?php  } break;} ?>

                <input type="text" id="tampil_bulan" name="tampil_bulan" class="form-control datetimepicker-input" data-target="#reservationdate1" placeholder="Pilih bulan dan tahun" value="<?php $now = date('m-Y'); foreach ($tampil as $value) { echo ($value == null) ? "$now" : "$value"; } ?>" required/>
                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <button type="submit" class="btn btn-secondary float-right ml-3">Tampilkan</button>
              </div>
            </form>
          </span>

          <h4 class="card-title float-right mt-1 col-2">
            <a href="<?= base_url('Prd_c/prediksi')?>" class="btn bg-navy btn-icon-split float-right">
              <i class="fas fa-bezier-curve text-sm"></i>
              <span class="">&nbsp;Prediksi Data</span>
            </a>
          </h4>
        </div>

        <div class="card-body">
          
          <table id="tb_prediksi" class="table table-bordered table-hover" style="width: 100%">
            <thead >
              <?php
                  /*date_default_timezone_set("Asia/Jakarta");
                  $this_m = this_m();
                  $next_1m = next_1m();*/
                  $now = date('m-Y');
                  $next = date('m-Y', strtotime('+1 months'));
                  $prev = date('m-Y', strtotime('-1 months'));
                  foreach ($tampil as $value) {
                    if ($value == $now || $value == null) {
                      $this_m = this_m();
                      $next_1m = next_1m();
                    } else if ($value == $next) {
                      $this_m = next_1m();
                      $next_1m = next_2m();
                    } else if ($value == $prev) {
                      $this_m = prev_1m();
                      $next_1m = this_m();
                    } else {
                      $this_m = "Bulan Ini";
                      $next_1m = "Bulan Depan";
                    }
                    
                  }
              ?>
            <tr>
              <th>No.</th>
              <!-- <th>Bulan-Tahun</th> -->
              <th>Nama Obat</th>
              <th>Satuan Terkecil</th>
              <th>Kebutuhan <?= $this_m ?></th>
              <th>Prediksi <?= $next_1m ?></th>
              <th style="width: 9%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1;
                foreach ($prd as $baris) {
                  foreach ($tampil as $key => $value) {
                    if (($baris->bulan_tahun == $now) && ($value == null) && ($baris->mad != NULL || 0)) {
            ?>

             <tr class="#">
              <td><?= $no++; ?></td>
              <!-- <td><?= $baris->bulan_tahun; ?></td> -->
              <td><?= $baris->nm_obat; ?></td>
              <td><?= $baris->stn_kcl; ?></td>
              <td><?= $baris->butuh_lalu; ?></td>
              <td><?= $baris->butuh_skrg; ?></td>
              <td>
                <!-- <a href="<?= base_url('Prd_c/detail/'.$baris->id_prd) ?>" class="btn btn-outline-success btn-sm" title="Detail">
                  <span class="fas fa-newspaper"></span>
                </a> -->
                <a href="<?= base_url('Prd_c/delete/'.$baris->id_prd) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-secondary btn-sm" title="Hapus">
                  <span class="fas fa-trash"></span>
                </a>
              </td>
            </tr>

            <?php
                    } else if (($baris->bulan_tahun == $value) && ($baris->mad != NULL || 0)) {
            ?>

            <tr class="#">
              <td><?= $no++; ?></td>
              <td><?= $baris->nm_obat; ?></td>
              <td><?= $baris->stn_kcl; ?></td>
              <td><?= $baris->butuh_lalu; ?></td>
              <td><?= $baris->butuh_skrg; ?></td>
              <td>
                <a href="<?= base_url('Prd_c/delete/'.$baris->id_prd) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-secondary btn-sm" title="Hapus">
                  <span class="fas fa-trash"></span>
                </a>
              </td>
            </tr>

            <?php
                  }
                }
              }
            ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title text-lg">Cara Penggunaan Halaman</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <p class="text-md">
          Halaman ini merupakan fitur untuk melakukan prediksi kebutuhan obat satu bulan yang akan datang. Halaman ini menampilkan kebutuhan bulan ini dan juga prediksi kebutuhan untuk bulan berikutnya.
        </p>
        
        <p class="text-md">
          <div class="row">

            <div class="col-1">
              1.
            </div>

            <div class="col-11">
              Untuk mendapatkan data prediksi bulan selanjutnya klik tombol &nbsp;<button class="btn btn-xs bg-navy btn-icon-split"><i class="fas fa-plus"></i>&nbsp;Prediksi Data</button>, maka akan muncul data-datanya.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              2.
            </div>

            <div class="col-11">
              Untuk menghapus data, klik tombol &nbsp;<button class="btn btn-outline-secondary btn-xs"><span class="fas fa-trash"></span></button>. Kemudian klik OK.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              3.
            </div>

            <div class="col-11">
              Untuk menampilkan data bulan sebelumnya, pilih bulan ke-berapa yang perlu ditampilkan kemudian klik &nbsp;<button class="btn btn-secondary btn-xs">Tampilkan</button>
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              4.
            </div>

            <div class="col-11">
              Untuk menghapus data dalam satu bulan, tampilkan bulan yang akan dihapus terlebih dahulu. Kemudian hapus dengan klik tombol &nbsp;<button class="btn btn-outline-secondary btn-xs"><i class="fas fa-trash-alt text-bold"></i></button>.
            </div>
          
          </div>
        </p>

      </div>
    </div>
  </div>
</div>
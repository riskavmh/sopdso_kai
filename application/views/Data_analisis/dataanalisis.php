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

  <form action="<?= base_url('Anl_c/import_excel'); ?>" method="POST" enctype="multipart/form-data">  
    <div class="card">

      <div class="row mb-0"> 

        <!-- left column -->
        <div class="col-md-6">
            <div class="card-body">

              <div class="form-group">
                <label for="im_stok">File Stok Obat*</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="im_stok" name="im_stok" required>
                    <label for="im_stok" class="custom-file-label text-muted">Pilih file</label>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <div class="row">

                  <div class="col-7">
                    <label>Bulan dan Tahun*</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                      <input type="text" id="bulan_tahun" name="bulan_tahun" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="mm-yyyy" required/>
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>

                  <div class="col-5">
                    <label for="angka_buffer">Angka Buffer*</label>
	                  <input type="text" class="form-control" id="angka_buffer" name="angka_buffer" placeholder="cth : 1.8" required>
                  </div>

                </div>
              </div>

            </div>
            
        </div>

        <!-- right column -->
        <div class="col-md-6">
            <div class="card-body">

              <div class="form-group">
                <label for="im_guna">File Penggunaan Obat*</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="im_guna" name="im_guna" required>
                    <label for="im_guna" class="custom-file-label text-muted">Pilih file</label>
                  </div>
                </div>
              </div>
	          
              <div class="col-12">
                <button class="btn btn-info col-12" type="submit" style="margin-top: 27px;">
                	Import
                </button>
              </div> 
        </div>

      </div>
    </div>
  </form>
</div>


<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header col-12">
          <h4 class="mt-3 mb-0 card-title text-bold col-4">
          	<?= $page ?> <!-- - <?= strtoupper(next_1m()); ?> <?= date("Y") ?> -->
          </h4>

          <span class="card-title text-sm col-3 mt-1">
            <!-- <label>Bulan dan Tahun*</label> -->
            <form action="<?= base_url('Anl_c'); ?>" method="POST">
              <div class="input-group date" id="reservationdate1" data-target-input="nearest">

                <?php
                  $now = date('m-Y');
                  foreach ($anl as $baris) {
                    foreach ($tampil as $key => $value) {
                ?>
                <a href="<?= ($value == null) ? base_url('Anl_c/delete_bulan/').$now : base_url('Anl_c/delete_bulan/').$value ?>" onclick="return confirm('Yakin hapus semua data pada bulan yang sudah dipilih?')">
                  <button type="button" class="btn btn-outline-secondary text-bold text-lg float-left mr-3" title="Hapus semua data pada bulan yang ditampilkan"><i class="fas fa-trash-alt text-bold"></i></button>
                </a>
              <?php  } break;} ?>

                <input type="text" id="tampil_bulan" name="tampil_bulan" class="form-control datetimepicker-input" data-target="#reservationdate1"placeholder="Pilih bulan dan tahun" value="<?php $now = date('m-Y'); foreach ($tampil as $value) { echo ($value == null) ? "$now" : "$value"; } ?>" required/>
                <div class="input-group-append" data-target="#reservationdate1" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
                <button type="submit" class="btn btn-secondary float-right ml-3">Tampilkan</button>
              </div>
            </form>
          </span>

          <h4 class="mt-1 mb-0 card-title float-right col-4">
            <a href="<?= base_url('Anl_c/tambah')?>" class="btn bg-navy btn-icon-split float-right">
              <i class="fas fa-plus"></i>
              <span class="mb-0">&nbsp;Tambah Data</span>
            </a>
          </h4>
        </div>

        <div class="card-body">
          <table id="tb_analisis" class="table table-bordered table-hover display nowrap" style="width: 100%;">
            <thead>
				<?php
          date_default_timezone_set("Asia/Jakarta");
          $now = date('m-Y');
          $next = date('m-Y', strtotime('+1 months'));
          $prev = date('m-Y', strtotime('-1 months'));
          foreach ($tampil as $value) {
            if ($value == $now || $value == null ) {
              $beli1 = prev_1m() ." ". date("Y");
              $beli2 = prev_2m() ." ". date("Y");
            } else if ($value == $next) {
              $beli1 = this_m() ." ". date("Y");
              $beli2 = prev_1m() ." ". date("Y");
            } else if ($value == $prev) {
              $beli1 = prev_2m() ." ". date("Y");
              $beli2 = prev_3m() ." ". date("Y");
            } else {
              $beli1 = "1 Bulan Lalu";
              $beli2 = "2 Bulan Lalu";
            }  
          }
				?>
				<tr>
				  <th style="width: 9%;"></th>
          <th>No.</th>
          <!-- <th>Bulan-Tahun</th> -->
				  <th>Nama Obat</th>
				  <th>Satuan Terkecil</th>
				  <th>Stok Gudang</th>
				  <th>Pembelian <?= $beli1 ?></th>
				  <th>Pembelian <?= $beli2 ?></th>
				  <th>Permintaan PB</th>
				  <th>Permintaan BW</th>
				  <th>Permintaan JR</th>
				  <th>Stok Gudang Nyata</th>
				  <th>Kebutuhan/Bulan</th>
				  <th>Kebutuhan plus Buffer</th>
				  <th>Kekurangan</th>
				  <th>Order</th>
				</tr>
        <?php
      // }
        ?>
            </thead>
            <tbody>
            <?php $no = 1;
            // var_dump($tampil);
                foreach ($anl as $baris) {
                  // var_dump($baris->bulan_tahun);

                  // date_default_timezone_set("Asia/Jakarta");
                  // $next = date('m-Y', strtotime('+1 months'));
                  foreach ($tampil as $key => $value) {
                    if (($baris->bulan_tahun == $now) && ($value == null)) {
                    // if (($baris->bulan_tahun == '05-2022')) {
                    // var_dump($value);
                    // var_dump($baris->bulan_tahun);

                  // if ($baris->bulan_tahun == $next) {
            ?>
            <tr>
              <td>
                <a href="<?= base_url('Anl_c/ubah/'.$baris->id_anl) ?>" class="btn btn-outline-dark btn-sm" title="Ubah">
                  <span class="fas fa-pencil-alt"></span>
                </a>
                <a href="<?= base_url('Anl_c/delete/'.$baris->id_anl) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-secondary btn-sm" title="Hapus">
                  <span class="fas fa-trash"></span>
                </a>
              </td>
              <td><?= $no++; ?></td>
              <!-- <td><?= $baris->bulan_tahun; ?></td> -->
              <td><?= $baris->nm_obat; ?></td>
              <td><?= $baris->stn_kcl; ?></td>
              <td><?= $baris->stok_gdg; ?></td>
              <td><?= $baris->beli1; ?></td>
              <td><?= $baris->beli2; ?></td>
              <td><?= $baris->minta_pb; ?></td>
              <td><?= $baris->minta_bw; ?></td>
              <td><?= $baris->minta_jr; ?></td>
              <td><?= $baris->stok_nyata; ?></td>
              <td><?= $baris->butuh_bln; ?></td>
              <td><?= $baris->butuh_buffer; ?></td>
              <td><?= $baris->kurang; ?></td>
              <td><?= $baris->jml_order; ?></td>
            </tr>
            <?php
                    } else if ($baris->bulan_tahun == $value) {
            ?>
            <tr>
              <td>
                <a href="<?= base_url('Anl_c/ubah/'.$baris->id_anl) ?>" class="btn btn-outline-dark btn-sm" title="Ubah">
                  <span class="fas fa-pencil-alt"></span>
                </a>
                <a href="<?= base_url('Anl_c/delete/'.$baris->id_anl) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-secondary btn-sm" title="Hapus">
                  <span class="fas fa-trash"></span>
                </a>
              </td>

              <td><?= $no++; ?></td>
              <!-- <td><?= $baris->bulan_tahun; ?></td> -->
              <td><?= $baris->nm_obat; ?></td>
              <td><?= $baris->stn_kcl; ?></td>
              <td><?= $baris->stok_gdg; ?></td>
              <td><?= $baris->beli1; ?></td>
              <td><?= $baris->beli2; ?></td>
              <td><?= $baris->minta_pb; ?></td>
              <td><?= $baris->minta_bw; ?></td>
              <td><?= $baris->minta_jr; ?></td>
              <td><?= $baris->stok_nyata; ?></td>
              <td><?= $baris->butuh_bln; ?></td>
              <td><?= $baris->butuh_buffer; ?></td>
              <td><?= $baris->kurang; ?></td>
              <td><?= $baris->jml_order; ?></td>
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
          Halaman ini merupakan fitur untuk menggabungkan 2 file yaitu file stok obat dan file penggunaan obat. Kedua file yang telah digabung ini akan menjadi data analisis rancangan anggaran biaya. Kedua file untuk import tersebut dapat diunduh <a href="https://drive.google.com/drive/folders/1gysL4OEhJkUywrAE6OWivBnv-kJfr1q8?usp=sharing"><b><u>di sini</u></b></a>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              1. 
            </div>

            <div class="col-11">
              Untuk import file, masukkan salah satu file stok dan file penggunaan sesuai dengan tempat input file-nya. Masukkan bulan tahun dan angka buffer (1.8). Klik tombol &nbsp;<button class="btn btn-info btn-xs">Import</button>.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              2. 
            </div>

            <div class="col-11">
               Untuk fitur &nbsp;<button class="btn btn-xs bg-navy btn-icon-split"><i class="fas fa-plus"></i>&nbsp;Tambah Data</button> digunakan untuk menambahkan data yang belum ada pada kedua file yang telah digabungkan. Masukkan data-datanya berupa angka.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              3.
            </div>

            <div class="col-11">
              Untuk mengubah data, klik tombol &nbsp;<button class="btn btn-outline-dark btn-xs"><span class="fas fa-pencil-alt"></span></button>. Kemudian klik &nbsp;<button class="btn btn-info btn-xs">Ubah</button>
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              4.
            </div>

            <div class="col-11">
              Untuk menghapus data, klik tombol &nbsp;<button class="btn btn-outline-secondary btn-xs"><span class="fas fa-trash"></span></button>. Kemudian klik OK.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              5.
            </div>

            <div class="col-11">
              Untuk menampilkan data bulan sebelumnya, pilih bulan ke-berapa yang perlu ditampilkan kemudian klik &nbsp;<button class="btn btn-secondary btn-xs">Tampilkan</button>
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              6.
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
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

        <div class="card-header">
          <h4 class="mt-2 card-title text-bold text-center"><?= $page ?></h4>

          <h4 class="mt-1 card-title float-right">
            <a href="<?= base_url('Kdl_c/tambah')?>" class="btn bg-navy btn-icon-split float-right">
              <i class="fas fa-plus"></i>
              <span class="text">&nbsp;Tambah Data</span>
            </a>
          </h4>
        </div>

          <div class="card-body">
            <table id="tb_kdl" class="table table-bordered" style="width: 100%">
              <thead >
              <tr>
                <th>No.</th>
                <th>Nama Obat</th>
                <th>Satuan Terkecil</th>
                <th>No Batch</th>
                <th>Kedaluwarsa</th>
                <th style="width: 9%"></th>
              </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                  foreach ($kdl as $baris) {

                    date_default_timezone_set("Asia/Jakarta");
                    $today = date('Y-m-d');
                    $today = strtotime($today);
                    // var_dump($today);
                    $expire = strtotime($baris->tgl_kdl);
                    $a = ($expire-$today);
                    $b = floor($a / (24*60*60*30));

              ?>
              <tr class="<?php echo (($b >= 0) && ($b <= 6)) ? 'bg-danger' : ((($b > 6) && ($b <= 12)) ? 'bg-warning' : ''); ?>">
                <td><?= $no++; ?></td>
                <td><?= $baris->nm_obat; ?></td>
                <td><?= $baris->stn_kcl; ?></td>
                <td><?= $baris->no_batch; ?></td>
                <td><?php $exp = date("d-m-Y",strtotime($baris->tgl_kdl)); echo $exp; ?></td>
                <td>
                  <a href="<?= base_url('Kdl_c/ubah/'.$baris->id_kdl) ?>" class="btn btn-dark btn-sm" title="Ubah">
                    <span class="fas fa-pencil-alt"></span>
                  </a>
                  <a href="<?= base_url('Kdl_c/delete/'.$baris->id_kdl) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-secondary btn-sm" title="Hapus">
                    <span class="fas fa-trash"></span>
                  </a>
                </td>
              </tr>

              <?php
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
          <div class="row">

            <div class="col-1">
              1.
            </div>

            <div class="col-11">
              Untuk menambahkan data klik tombol &nbsp;<button class="btn btn-xs bg-navy btn-icon-split"><i class="fas fa-plus"></i>&nbsp;Tambah Data</button>, masukkan data-datanya. Kemudian simpan dengan klik tombol &nbsp;<button class="btn btn-info btn-xs">Tambah</button>.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              2.
            </div>

            <div class="col-11">
              Untuk mengubah data, klik tombol &nbsp;<button class="btn btn-dark btn-xs"><span class="fas fa-pencil-alt"></span></button>. Kemudian klik &nbsp;<button class="btn btn-info btn-xs">Ubah</button>
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              3.
            </div>

            <div class="col-11">
              Untuk menghapus data, klik tombol &nbsp;<button class="btn btn-secondary btn-xs"><span class="fas fa-trash"></span></button>. Kemudian klik OK.
            </div>
          
          </div>
        </p>

      </div>
    </div>
  </div>
</div>

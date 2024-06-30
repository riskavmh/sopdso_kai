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

  <form action="<?= base_url('Obat_c/tambah')?>" method="post">
    <div class="card col-12">

      <div class="row">
        <div class="col-6">
          <div class="card-body">

            <div class="form-group">
              <label for="nm_obat">Nama Obat</label>
              <input type="text" class="form-control" id="nm_obat" name="nm_obat" placeholder="Nama Obat" required>
            </div>
            
          </div>
        </div>

        <div class="col-3">
          <div class="card-body">

            <div class="form-group">
              <label for="stn_kcl">Satuan Terkecil</label>
              <select id="stn_kcl" name="stn_kcl" class="form-control select2" style="width: 100%;">
                <option value="">-PILIH-</option>
                <?php foreach($stn->result() as $key => $data) { ?>
                <option value="<?= $data->stn_kcl; ?>"><?= $data->stn_kcl; ?></option>
                <?php } ?>
              </select>
            </div>
            
          </div>
        </div>

        <div class="col-3">
          <div class="card-body">
            <button class="btn btn-info toastsDefaultSuccess col-12" type="submit" style="margin-top: 27px;">Tambah </button>
          </div>
        </div>
      
      </div>
    </div>
  </form>
</div>


<div class="container-fluid">
  <div class="row" >
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="mt-2 card-title text-bold"><?= $page ?></h4>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tb_obat" class="table table-bordered table-hover" style="width: 100%">
            <thead>
            <tr>
              <th>No.</th>
              <th>Nama Obat</th>
              <th>Satuan Terkecil</th>
              <th style="width: 9%"></th>
            </tr>
            </thead>
            <tbody>
            <?php $no = 1;
                foreach ($obat as $baris) {
            ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $baris->nm_obat; ?></td>
              <td><?= $baris->stn_kcl; ?></td>
              <td>
                <a href="<?= base_url('Obat_c/ubah/'.$baris->id_obat) ?>" class="btn btn-outline-dark btn-sm" title="Ubah">
                  <span class="fas fa-pencil-alt"></span>
                </a>
                <a href="<?= base_url('Obat_c/delete/'.$baris->id_obat) ?>" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-secondary btn-sm" title="Hapus">
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
              Untuk menambahkan data, masukkan nama obat dan pilih satuan terkecil. Klik tombol &nbsp;<button class="btn btn-info btn-xs">Tambah</button>.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              2.
            </div>

            <div class="col-11">
              Untuk mengubah data, klik tombol &nbsp;<button class="btn btn-outline-dark btn-xs"><span class="fas fa-pencil-alt"></span></button>. Kemudian pada halaman edit ubah nama obat dan/atau satuan terkecilnya.
            </div>
          
          </div>
        </p>

        <p class="text-md">
          <div class="row">

            <div class="col-1">
              3.
            </div>

            <div class="col-11">
              Untuk menghapus data, klik tombol &nbsp;<button class="btn btn-outline-secondary btn-xs"><span class="fas fa-trash"></span></button>. Kemudian klik OK.
            </div>
          
          </div>
        </p>

      </div>
    </div>
  </div>
</div>
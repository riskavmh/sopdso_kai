<div class="container-fluid">
  <?php foreach($ubah as $baris) { ?>
  <form action="<?= base_url('Obat_c/edit/'.$baris->id_obat)?>" method="post">
    <div class="card col-12">

      <div class="card-header">
        <h3 class="card-title">Ubah Data Obat</h3>
      </div>
          <!-- /.card-header -->

      <div class="row">

        <div class="col-8">
            <div class="card-body">

              <div class="form-group">
                <label for="nm_obat">Nama Obat</label>
                <input type="text" class="form-control" id="nm_obat" name="nm_obat" value="<?= $baris->nm_obat; ?>" placeholder="Nama Obat">
              </div>
            
          </div>
        </div>

        <!-- right column -->
        <div class="col-4">
        <!-- general form elements -->

            <div class="card-body">

              <div class="form-group">
                <label for="stn_kcl">Satuan Terkecil</label>
                <select id="stn_kcl" name="stn_kcl" class="form-control select2" style="width: 100%;">
                  <option selected><?= $baris->stn_kcl; ?></option>
                  <?php foreach($stn->result() as $key => $data) { ?>
                  <option value="<?= $data->stn_kcl; ?>"><?= $data->stn_kcl; ?></option>
                  <?php } ?>
                </select>
              </div>
            
          </div>
        <!-- /.card -->
        </div>

      <!-- /.row -->
      </div>

    <!--/.col (right) -->
    </div>

    <div class="card">

      <div class="card-footer">
        <a href="<?= base_url('Obat_c')?>" class="btn btn-secondary">
          <span class="text">Kembali</span>
        </a>
        <button type="submit" class="btn btn-info col-3 float-right">Ubah</button>
        </a>
      </div>

    </div>

  </form>
  <?php } ?>
</div>



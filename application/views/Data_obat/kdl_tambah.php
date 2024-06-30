<!-- <div class="container-fluid">
  <form action="<?= base_url('kdl_c/import_excel'); ?>" method="POST" enctype="multipart/form-data">
    <div class="card col-12">
      <div class="row" >

        <div class="col-8">
          <div class="card-body">

              <div class="form-group">
                <label for="im_kdl">Masukkan file excel</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="im_kdl" name="im_kdl" required>
                    <label for="im_kdl" class="custom-file-label">Pilih file</label>
                  </div>
                </div>
              </div>
            
          </div>
        </div>

        <div class="col-4">
          <div class="card-body">
            <button class="btn btn-info col-12" type="submit" style="margin-top: 30px;">Import </button>
          </div>
        </div>

      </div>
    </div>
  </form>
</div> -->


<div class="container-fluid">
  <!-- form start -->
  <form action="<?= base_url('Kdl_c/add')?>" method="post">
    <div class="card">
    <div class="row">
    <!-- left column -->
      <div class="col-md-6">
      <!-- general form elements -->
        
          <div class="card-body">

            <div class="form-group">
              <label for="nm_obat">Nama Obat*</label>
              <select id="nm_obat" name="nm_obat" class="form-control select2" required>
                <option value="">-PILIH-</option>
                <?php foreach($obat as $key => $data) { ?>
                <option value="<?= $data->nm_obat; ?>"><?= $data->nm_obat; ?></option>
                <?php } ?>
              </select>
            </div>

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

<!-- -------------------------------------------------------------------------------------------------- -->

      <!-- right column -->
      <div class="col-md-6">
          <div class="card-body">

            <div class="form-group">
              <label for="no_batch">Nomor Batch</label>
              <input type="text" class="form-control" id="no_batch" name="no_batch" placeholder="Nomor Batch">
            </div>

            <div class="form-group">
              <label for="">Tanggal Kedaluwarsa*</label>
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" id="tgl_kdl" name="tgl_kdl" class="form-control datetimepicker-input" data-target="#reservationdate" placeholder="yyyy-mm-dd" required />
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker"  required>
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>

          </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->

    <div class="card">
      <div class="card-footer">
        <a href="<?= base_url('Kdl_c')?>" class="btn btn-secondary">
          <span class="text">Kembali</span>
        </a>
        <button type="submit" class="btn btn-info col-2 float-right">Tambah</button>
      </div>
    </div>
    
  </form>
</div>
<!-- /.container-fluid -->
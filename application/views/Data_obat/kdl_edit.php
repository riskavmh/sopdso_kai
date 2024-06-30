<div class="container-fluid">
  <!-- form start -->
  <?php foreach($ubah as $baris) { ?>
  <form action="<?= base_url('Kdl_c/edit/'.$baris->id_kdl)?>" method="post">
    <div class="card">
    <div class="row">
    <!-- left column -->
      <div class="col-md-6">
      <!-- general form elements -->
        
          <div class="card-body">

            <div class="form-group">
              <label for="nm_obat">Nama Obat</label>
              <select id="nm_obat" name="nm_obat" class="form-control select2">
                <option selected><?= $baris->nm_obat; ?></option>
                <?php foreach($obat as $key => $data) { ?>
                <option value="<?= $data->nm_obat; ?>"><?= $data->nm_obat; ?></option>
                <?php } ?>
              </select>
            </div>

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

      </div>
      <!--/.col (left) -->

<!-- -------------------------------------------------------------------------------------------------------------------------------------------- -->

      <!-- right column -->
      <div class="col-md-6">
          <div class="card-body">

            <div class="form-group">
              <label for="no_batch">Nomor Batch</label>
              <input type="text" class="form-control" id="no_batch" name="no_batch" value="<?= $baris->no_batch; ?>" placeholder="Nomor Batch">
            </div>

            <div class="form-group">
              <label for="tgl_kdl">Tanggal Kedaluwarsa:</label>
              <div class="input-group date" id="reservationdate" data-target-input="nearest">
                <input type="text" id="tgl_kdl" name="tgl_kdl" class="form-control datetimepicker-input" data-target="#reservationdate" value="<?php $exp = date("Y-m-d",strtotime($baris->tgl_kdl)); echo $exp; ?>" required />
                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <input type="hidden" class="form-control" id="up_date" name="up_date" value="<?= date('Y-m-d H:i:s'); ?>">
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
        <button type="submit" class="btn btn-info col-2 float-right">Ubah</button>
      </div>
    </div>
    
  </form>
  <?php } ?>
</div>
<!-- /.container-fluid -->
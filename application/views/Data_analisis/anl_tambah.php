<div class="container-fluid">
  <form action="<?= base_url('Anl_c/add')?>" method="post">

    <div class="card">
      <div class="row">
        <div class="col-md-6">
            <div class="card-body">

              <?php
                  date_default_timezone_set("Asia/Jakarta");
                  $beli1 = prev_1m() ." ". date("Y");
                  $beli2 = prev_2m() ." ". date("Y");
              ?>

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
                <div class="row">
                  <div class="col-6">
                    <label for="stn_kcl">Satuan Terkecil</label>
                    <select id="stn_kcl" name="stn_kcl" class="form-control select2" style="width: 100%;">
                      <option value="">-PILIH-</option>
                      <?php foreach($stn->result() as $key => $data) { ?>
                      <option value="<?= $data->stn_kcl; ?>"><?= $data->stn_kcl; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>Bulan dan Tahun*</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                      <input type="text" id="bulan_tahun" name="bulan_tahun" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="mm-yyyy" required/>
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="stok_gdg">Stok Gudang</label>
                <input type="text" class="form-control" id="stok_gdg" name="stok_gdg" placeholder="Stok Gudang">
              </div>

              <label for="minta_pb">Pembelian</label>
              <div class="form-group">
                <div class="row">
                  <div class="col-6">
                    <input type="text" class="form-control" id="beli1" name="beli1" placeholder="Pembelian <?= $beli1 ?>">
                  </div>
                  <div class="col-6">
                    <input type="text" class="form-control" id="beli2" name="beli2" placeholder="Pembelian <?= $beli2 ?>">
                  </div>
                </div>
              </div>
              
              <label for="minta_pb">Permintaan</label>
              <div class="form-group">
                <div class="row">
                  <div class="col-4">
                    <input type="text" class="form-control" id="minta_pb" name="minta_pb" placeholder="Probolinggo">
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" id="minta_bw" name="minta_bw" placeholder="Banyuwangi">
                  </div>
                  <div class="col-4">
                    <input type="text" class="form-control" id="minta_jr" name="minta_jr" placeholder="Jember">
                  </div>
                </div>
              </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card-body">

              <div class="form-group">
                <label for="stok_nyata">Stok Gudang Nyata</label>
                <input type="text" class="form-control" id="stok_nyata" name="stok_nyata" placeholder="Stok Gudang Nyata">
              </div>

              <div class="form-group">
                <label for="butuh_bln">Kebutuhan per Bulan</label>
                <input type="text" class="form-control" id="butuh_bln" name="butuh_bln" placeholder="Kebutuhan per Bulan">
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-8">
                    <label for="butuh_buffer">Kebutuhan plus Buffer</label>
                    <input type="text" class="form-control" id="butuh_buffer" name="butuh_buffer" placeholder="Kebutuhan plus Buffer">
                  </div>
                  <div class="col-4">
                    <label for="angka_buffer">Angka Buffer*</label>
                    <input type="text" class="form-control" id="angka_buffer" name="angka_buffer" placeholder="cth : 1.8" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="kurang">Kekurangan</label>
                <input type="text" class="form-control" id="kurang" name="kurang" placeholder="Kekurangan">
              </div>

              <div class="form-group">
                <label for="jml_order">Order</label>
                <input type="text" class="form-control" id="jml_order" name="jml_order" placeholder="Order">
              </div>

            </div>
          
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-footer">
        <a href="<?= base_url('Anl_c')?>" class="btn btn-secondary">
          <span class="text">Kembali</span>
        </a>
        <button type="submit" class="btn btn-info col-2 float-right">Tambah</button>
        </a>
      </div>
    </div>
  </form>
</div>

<!-- <div class="container-fluid">
  <form action="<?= base_url('Anl_c/add')?>" method="post">

    <div class="card">
      <div class="row">
        <div class="col-md-6">
            <div class="card-body">

              <?php
                  date_default_timezone_set("Asia/Jakarta");
                  $beli1 = this_m() ." ". date("Y");
                  $beli2 = prev_1m() ." ". date("Y");
              ?>

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
                <div class="row">
                  <div class="col-6">
                    <label for="stn_kcl">Satuan Terkecil</label>
                    <select id="stn_kcl" name="stn_kcl" class="form-control select2" style="width: 100%;">
                      <option value="">-PILIH-</option>
                      <?php foreach($stn->result() as $key => $data) { ?>
                      <option value="<?= $data->stn_kcl; ?>"><?= $data->stn_kcl; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="col-6">
                    <label>Bulan dan Tahun*</label>
                    <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                      <input type="text" id="bulan_tahun" name="bulan_tahun" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="mm-yyyy" required/>
                      <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                          <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="stok_gdg">Stok Gudang</label>
                <input type="text" class="form-control" id="stok_gdg" name="stok_gdg" placeholder="Stok Gudang">
              </div>

              <div class="form-group">
                <label for="stok_nyata">Stok Gudang Nyata</label>
                <input type="text" class="form-control" id="stok_nyata" name="stok_nyata" placeholder="Stok Gudang Nyata">
              </div>

            </div>
        </div>

        <div class="col-md-6">
            <div class="card-body">

              <div class="form-group">
                <label for="butuh_bln">Kebutuhan per Bulan</label>
                <input type="text" class="form-control" id="butuh_bln" name="butuh_bln" placeholder="Kebutuhan per Bulan">
              </div>

              <div class="form-group">
                <div class="row">
                  <div class="col-8">
                    <label for="butuh_buffer">Kebutuhan plus Buffer</label>
                    <input type="text" class="form-control" id="butuh_buffer" name="butuh_buffer" placeholder="Kebutuhan plus Buffer">
                  </div>
                  <div class="col-4">
                    <label for="angka_buffer">Angka Buffer*</label>
                    <input type="text" class="form-control" id="angka_buffer" name="angka_buffer" placeholder="cth : 1.8" required>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="kurang">Kekurangan</label>
                <input type="text" class="form-control" id="kurang" name="kurang" placeholder="Kekurangan">
              </div>

              <div class="form-group">
                <label for="jml_order">Order</label>
                <input type="text" class="form-control" id="jml_order" name="jml_order" placeholder="Order">
              </div>

            </div>
          
        </div>
      </div>
    </div>
    <div class="card">
      <div class="card-footer">
        <a href="<?= base_url('Anl_c')?>" class="btn btn-secondary">
          <span class="text">Kembali</span>
        </a>
        <button type="submit" class="btn btn-info col-2 float-right">Tambah</button>
        </a>
      </div>
    </div>
  </form>
</div> -->
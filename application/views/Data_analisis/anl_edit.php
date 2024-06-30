<div class="container-fluid">
<?php foreach($ubah as $baris) { ?>
  <form action="<?= base_url('Anl_c/edit/'.$baris->id_anl)?>" method="post">

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
              <label for="nm_obat">Nama Obat</label>
              <input type="text" class="form-control" id="nm_obat" name="nm_obat" value="<?= $baris->nm_obat; ?>" readonly>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <label for="stn_kcl">Satuan Terkecil</label>
                  <input type="text" class="form-control" id="stn_kcl" name="stn_kcl" value="<?= $baris->stn_kcl; ?>" readonly>
                </div>
                <div class="col-6">
                  <label>Bulan dan Tahun*</label>
                  <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                    <input type="text" id="bulan_tahun" name="bulan_tahun" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="mm-yyyy" value="<?php echo $baris->bulan_tahun; ?>" required/>
                    <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="stok_gdg">Stok Gudang</label>
              <input type="text" class="form-control" id="stok_gdg" name="stok_gdg" value="<?= $baris->stok_gdg; ?>" placeholder="Stok Gudang">
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <label for="beli1">Pembelian 1 bulan lalu</label>
                  <input type="text" class="form-control" id="beli1" name="beli1" value="<?= $baris->beli1; ?>" placeholder="<?= $beli1; ?>">
                </div>
                <div class="col-6">
                  <label for="beli2">Pembelian 2 bulan lalu</label>
                  <input type="text" class="form-control" id="beli2" name="beli2" value="<?= $baris->beli2; ?>" placeholder="<?= $beli1; ?>">
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <div class="row">
                <div class="col-4">
                  <label for="minta_pb">Permintaan PB</label>
                  <input type="text" class="form-control" id="minta_pb" name="minta_pb" value="<?= $baris->minta_pb; ?>" placeholder="Probolinggo">
                </div>
                <div class="col-4">
                  <label for="minta_bw">Permintaan BW</label>
                  <input type="text" class="form-control" id="minta_bw" name="minta_bw" value="<?= $baris->minta_bw; ?>" placeholder="Banyuwangi">
                </div>
                <div class="col-4">
                  <label for="minta_jr">Permintaan JR</label>
                  <input type="text" class="form-control" id="minta_jr" name="minta_jr" value="<?= $baris->minta_jr; ?>" placeholder="Jember">
                </div>
              </div>
            </div>

          </div>
      </div>

      <div class="col-md-6">
        <div class="card-body">

          <div class="form-group">
            <label for="stok_nyata">Stok Gudang Nyata</label>
            <input type="text" class="form-control" id="stok_nyata" name="stok_nyata" value="<?= $baris->stok_nyata; ?>" placeholder="Stok Gudang Nyata">
          </div>

          <div class="form-group">
            <label for="butuh_bln">Kebutuhan per Bulan</label>
            <input type="text" class="form-control" id="butuh_bln" name="butuh_bln" value="<?= $baris->butuh_bln; ?>" placeholder="Kebutuhan per Bulan">
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-8">
                <label for="butuh_buffer">Kebutuhan plus Buffer</label>
                <input type="text" class="form-control" id="butuh_buffer" name="butuh_buffer" value="<?= $baris->butuh_buffer; ?>" placeholder="Kebutuhan plus Buffer">
              </div>
              <div class="col-4">
                <label for="angka_buffer">Angka Buffer*</label>
                <input type="text" class="form-control" id="angka_buffer" name="angka_buffer" value="<?= $baris->angka_buffer; ?>" placeholder="cth : 1.8" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="kurang">Kekurangan</label>
            <input type="text" class="form-control" id="kurang" name="kurang" value="<?= $baris->kurang; ?>" placeholder="Kekurangan">
          </div>

          <div class="form-group">
            <label for="jml_order">Order</label>
            <input type="text" class="form-control" id="jml_order" name="jml_order" value="<?= $baris->jml_order; ?>" placeholder="Order">
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="up_date" name="up_date" value="<?= date('Y-m-d H:i:s'); ?>">
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
      <button type="submit" class="btn btn-info col-2 float-right">Ubah</button>
      </a>
    </div>
  </div>

  </form>
<?php } ?>
</div>


<!--  <div class="container-fluid">
<?php foreach($ubah as $baris) { ?>
  <form action="<?= base_url('Anl_c/edit/'.$baris->id_anl)?>" method="post">

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
              <label for="nm_obat">Nama Obat</label>
              <input type="text" class="form-control" id="nm_obat" name="nm_obat" value="<?= $baris->nm_obat; ?>" readonly>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-6">
                  <label for="stn_kcl">Satuan Terkecil</label>
                  <input type="text" class="form-control" id="stn_kcl" name="stn_kcl" value="<?= $baris->stn_kcl; ?>" readonly>
                </div>
                <div class="col-6">
                  <label>Bulan dan Tahun*</label>
                  <div class="input-group date" id="reservationdate3" data-target-input="nearest">
                    <input type="text" id="bulan_tahun" name="bulan_tahun" class="form-control datetimepicker-input" data-target="#reservationdate3" placeholder="mm-yyyy" value="<?php echo $baris->bulan_tahun; ?>" required/>
                    <div class="input-group-append" data-target="#reservationdate3" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="stok_gdg">Stok Gudang</label>
              <input type="text" class="form-control" id="stok_gdg" name="stok_gdg" value="<?= $baris->stok_gdg; ?>" placeholder="Stok Gudang">
            </div>

            <div class="form-group">
            <label for="stok_nyata">Stok Gudang Nyata</label>
            <input type="text" class="form-control" id="stok_nyata" name="stok_nyata" value="<?= $baris->stok_nyata; ?>" placeholder="Stok Gudang Nyata">
          </div>

          </div>
      </div>

      <div class="col-md-6">
        <div class="card-body">

          <div class="form-group">
            <label for="butuh_bln">Kebutuhan per Bulan</label>
            <input type="text" class="form-control" id="butuh_bln" name="butuh_bln" value="<?= $baris->butuh_bln; ?>" placeholder="Kebutuhan per Bulan">
          </div>

          <div class="form-group">
            <div class="row">
              <div class="col-8">
                <label for="butuh_buffer">Kebutuhan plus Buffer</label>
                <input type="text" class="form-control" id="butuh_buffer" name="butuh_buffer" value="<?= $baris->butuh_buffer; ?>" placeholder="Kebutuhan plus Buffer">
              </div>
              <div class="col-4">
                <label for="angka_buffer">Angka Buffer*</label>
                <input type="text" class="form-control" id="angka_buffer" name="angka_buffer" value="<?= $baris->angka_buffer; ?>" placeholder="cth : 1.8" required>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="kurang">Kekurangan</label>
            <input type="text" class="form-control" id="kurang" name="kurang" value="<?= $baris->kurang; ?>" placeholder="Kekurangan">
          </div>

          <div class="form-group">
            <label for="jml_order">Order</label>
            <input type="text" class="form-control" id="jml_order" name="jml_order" value="<?= $baris->jml_order; ?>" placeholder="Order">
          </div>

          <div class="form-group">
            <input type="hidden" class="form-control" id="up_date" name="up_date" value="<?= date('Y-m-d H:i:s'); ?>">
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
      <button type="submit" class="btn btn-info col-2 float-right">Ubah</button>
      </a>
    </div>
  </div>

  </form>
<?php } ?>
</div> -->

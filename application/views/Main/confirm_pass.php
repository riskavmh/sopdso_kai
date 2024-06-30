<div class="container-fluid">
  <div class="lockscreen-wrapper">

    <div class="help-block text-center text-md text-bold">
      Masukkan password lama Anda.
    </div>

    <div class="lockscreen-item">
      <div class="card">
        <form class="" action="<?= base_url('Main/confirm/')?>" method="post">

          <div class="input-group">
            <input type="password" id="password" name="password" class="form-control" style="border:none;" maxlength="12" placeholder="password">
            <button type="submit" class="btn">
              <i class="fas fa-arrow-right text-muted"></i>
            </button>
          </div>

        </form>
      </div>
    </div>

    <div class="text-center text-md">
      Atau <a href="<?= base_url('Main')?>">Kembali</a> ke Beranda.
    </div>
    
  </div>
</div>
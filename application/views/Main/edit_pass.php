<div class="container-fluid">
  <!-- form start -->
  <?php foreach($ubah as $baris) { ?>
  <form action="<?= base_url('Main/edit/')?>" method="post">
    <div class="card">
    <div class="row">
    <!-- left column -->
      <div class="col-md-6">
      <!-- general form elements -->
        
          <div class="card-body">

            <div class="form-group">
              <label for="nama">Display Name</label>
              <input type="text" class="form-control" id="nama" name="nama" placeholder="nama" value="<?= $baris->nama; ?>" maxlength="20" required>
            </div>

            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $baris->username; ?>" maxlength="20" required>
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" name="password" maxlength="12" placeholder="Password" value="<?= $baris->password; ?>" required>
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
        <a href="<?= base_url('Main')?>" class="btn btn-secondary">
          <span class="text">Kembali</span>
        </a>
        <button type="submit" class="btn btn-info col-2 float-right">Ubah</button>
      </div>
    </div>
  </form>
  <?php } ?>
</div>
<!-- /.container-fluid -->
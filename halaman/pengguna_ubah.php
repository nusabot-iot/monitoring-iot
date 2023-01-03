<?php
$sql = "SELECT * FROM pengguna WHERE username='{$_GET['ubah']}'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Pengguna</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h5 class="m-0">Ubah Pengguna</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="?hal=pengguna">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="hidden" value="<?php echo $data['username'] ?>" name="old_username">
                      <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $data['nama_lengkap'] ?>">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-warning" name="ubah">Ubah</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
<?php

$alert = "";

if(isset($_POST['tambah'])){
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql_tambah = "INSERT INTO pengguna (username, password, nama_lengkap) VALUES ('{$_POST['username']}', '$password', '{$_POST['nama_lengkap']}')";
  mysqli_query($db, $sql_tambah);

  $alert = "tambah";
}

if(isset($_GET['hapus'])){
  $sql_hapus = "DELETE FROM pengguna WHERE username='{$_GET['hapus']}'";
  mysqli_query($db, $sql_hapus);

  $alert = "hapus";
}

if(isset($_POST['ubah'])){

  if($_POST['password'] == ""){
    $sql_ubah = "UPDATE pengguna SET username='{$_POST['username']}', nama_lengkap='{$_POST['nama_lengkap']}' WHERE username='{$_POST['old_username']}'";
  } else {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $sql_ubah = "UPDATE pengguna SET username='{$_POST['username']}', password='$password', nama_lengkap='{$_POST['nama_lengkap']}' WHERE username='{$_POST['old_username']}'";
  }

  mysqli_query($db, $sql_ubah);

  $alert = "ubah";
}

$sql = "SELECT * FROM pengguna";
$result = mysqli_query($db, $sql);

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
        <?php if($alert == "tambah"){ ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil</h5>
            Data sudah ditambahkan.
          </div>
        <?php } else if($alert == "hapus"){ ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil</h5>
            Data sudah dihapus.
          </div>
        <?php } else if($alert == "ubah"){ ?>
          <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-check"></i> Berhasil</h5>
            Data sudah diubah.
          </div>
          <?php } ?>
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Pengguna Terdaftar</h5>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_array($result)){  ?>
                    <tr>
                      <td><?php echo $row['username'] ?></td>
                      <td><?php echo $row['nama_lengkap'] ?></td>
                      <td><a href="?hal=pengguna_ubah&ubah=<?php echo $row['username'] ?>" class="btn btn-warning">Ubah</a> <a href="?hal=pengguna&hapus=<?php echo $row['username'] ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tambah Pengguna Baru</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="?hal=pengguna">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" name="password">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
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
<?php

$alert = "";

if(isset($_POST['tambah'])){
  $sql_tambah = "INSERT INTO perangkat (serialnumber, lokasi) VALUES ('{$_POST['serialnumber']}', '{$_POST['lokasi']}')";
  mysqli_query($db, $sql_tambah);

  $alert = "tambah";
}

if(isset($_GET['hapus'])){
  $sql_hapus = "UPDATE perangkat SET aktif='0' WHERE serialnumber='{$_GET['hapus']}'";
  mysqli_query($db, $sql_hapus);

  $alert = "hapus";
}

if(isset($_POST['ubah'])){
  $sql_ubah = "UPDATE perangkat SET serialnumber='{$_POST['serialnumber']}', lokasi='{$_POST['lokasi']}' WHERE serialnumber='{$_POST['old_serialnumber']}'";
  mysqli_query($db, $sql_ubah);

  $alert = "ubah";
}

$sql = "SELECT * FROM perangkat WHERE aktif='1'";
$result = mysqli_query($db, $sql);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Perangkat</h1>
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
                <h5 class="m-0">Perangkat Terdaftar</h5>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Serial Number</th>
                    <th>Lokasi</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_array($result)){  ?>
                    <tr>
                      <td><?php echo $row['serialnumber'] ?></td>
                      <td><?php echo $row['lokasi'] ?></td>
                      <td><a href="?hal=perangkat_ubah&ubah=<?php echo $row['serialnumber'] ?>" class="btn btn-warning">Ubah</a> <a href="?hal=perangkat&hapus=<?php echo $row['serialnumber'] ?>" class="btn btn-danger">Hapus</a></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Serial Number</th>
                    <th>Lokasi</th>
                    <th></th>
                  </tr>
                  </tfoot>
                </table>
                
              </div>
            </div>

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Tambah Perangkat Baru</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="?hal=perangkat">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Serial Number</label>
                      <input type="text" class="form-control" name="serialnumber">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Lokasi</label>
                      <input type="text" class="form-control" name="lokasi">
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
<?php
$sql = "SELECT * FROM perangkat WHERE serialnumber='{$_GET['ubah']}'";
$data = mysqli_fetch_array(mysqli_query($db, $sql));

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
        <div class="row">
          <!-- /.col-md-6 -->
          <div class="col-lg-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h5 class="m-0">Ubah Perangkat</h5>
              </div>
              <div class="card-body">
                <form method="POST" action="?hal=perangkat">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Serial Number</label>
                      <input type="hidden" value="<?php echo $data['serialnumber'] ?>" name="old_serialnumber">
                      <input type="text" class="form-control" name="serialnumber" value="<?php echo $data['serialnumber'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Lokasi</label>
                      <input type="text" class="form-control" name="lokasi" value="<?php echo $data['lokasi'] ?>">
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
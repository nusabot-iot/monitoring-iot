<?php

$awal = date("Y-m-01");
$akhir = date("Y-m-d", strtotime("+1 day"));

if(isset($_POST['tampil'])){
  $awal = $_POST['awal'];
  $akhir = $_POST['akhir'];
}

$sql = "SELECT * FROM sensor WHERE waktu BETWEEN '$awal' AND '$akhir'";
$result = mysqli_query($db, $sql);

?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sensor</h1>
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
            <div class="card">
              <div class="card-header">
                <form method="POST" action="?hal=sensor">
                  <div class="row">
                    <div class="col-2">
                      <input type="date" class="form-control" name="awal" value="<?php echo $awal ?>">
                    </div>
                    <div class="col-1">
                      <label>sampai</label>
                    </div>
                    <div class="col-2">
                      <input type="date" class="form-control" name="akhir" value="<?php echo $akhir ?>">
                    </div>
                    <div class="col-2">
                      <button type="submit" class="btn btn-primary" name="tampil">Tampil</button>
                    </div>
                  </div>
                </form>
              </div>
              <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Waktu</th>
                    <th>Sensor</th>
                    <th>Data</th>
                    <th>Serial Number</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php while($row = mysqli_fetch_array($result)){  ?>
                    <tr>
                      <td><?php echo $row['waktu'] ?></td>
                      <td><?php echo $row['sensor'] ?></td>
                      <td><?php echo $row['data'] ?></td>
                      <td><?php echo $row['serialnumber'] ?></td>
                    </tr>
                  <?php } ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Waktu</th>
                    <th>Sensor</th>
                    <th>Data</th>
                    <th>Serial Number</th>
                  </tr>
                  </tfoot>
                </table>
                
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
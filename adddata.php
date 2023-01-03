<?php

require "database.php";

$serialNumber = $_GET['serialnumber'];
$sensor = $_GET['sensor'];
$data = $_GET['data'];


if(cekSerial($db, $serialNumber)){
    $sql = "INSERT INTO sensor (sensor, data, serialnumber) VALUES ('$sensor', '$data', '$serialNumber')";

    if(mysqli_query($db, $sql)){
        echo "Data sudah ditambahkan";
    } else {
        echo "Data gagal ditambahkan";
    }
} else {
    echo "Serial Number Tidak Terdaftar";
}


function cekSerial($db, $serialNumber){
    $sql = "SELECT * FROM perangkat WHERE serialnumber = '$serialNumber'";
    $result = mysqli_query($db, $sql);

    if(mysqli_fetch_row($result) > 0){
        return true;
    } else {
        return false;
    }
}

?>
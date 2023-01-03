<?php

$db = mysqli_connect('localhost', 'root', '', 'monitoring');

if(!$db){
    die("ERROR: Gagal Terhubung: " . mysqli_connect_error());
}

?>
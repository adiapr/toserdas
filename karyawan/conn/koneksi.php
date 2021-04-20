<?php
    $koneksi=mysqli_connect("localhost","u7693570_toserdas","u7693570_toserdas","u7693570_toserdas");
        date_default_timezone_set('Asia/Jakarta');
    
    if (mysqli_connect_errno()){
        echo "Koneksi ke database gagal ".mysqli_connect_error();
    }
?>
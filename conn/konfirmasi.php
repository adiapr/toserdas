<?php
    include("koneksi.php");
    $id = $_GET['id'];
    

    $query = mysqli_query($koneksi,"UPDATE absensi set status='1' where id_absensi='$id'");
  
    header("location:../konfirmasi.php");   
?>
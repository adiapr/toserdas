<?php
    include("koneksi.php");
    
    $jadwal = $_POST['jadwal'];
    $id = $_GET['id'];
    

    $query = mysqli_query($koneksi,"UPDATE absensi set jadwal='$jadwal' where id_absensi='$id'");
  
    header("location:../konfirmasi.php");   
?>
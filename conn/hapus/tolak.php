<?php
    include("../koneksi.php");
    
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi,"DELETE FROM absensi WHERE id_absensi=$id");
    
    header("location:../../konfirmasi.php");    
    
?>
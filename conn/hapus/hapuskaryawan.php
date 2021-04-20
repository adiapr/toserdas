<?php
    include("../koneksi.php");
    
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi,"DELETE FROM karyawan WHERE id_karyawan=$id");
    
    if ($query){
        echo"<script> alert ('Data telah terhapus');window.location='../../formkaryawan.php'</script>";    
    }else{
        echo"Gagal menghapus data";
    }
    
?>
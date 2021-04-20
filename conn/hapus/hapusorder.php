<?php
    include("../koneksi.php");
    
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi,"DELETE FROM customer WHERE id_custoner=$id");
    
    if ($query){
        echo"<script> alert ('Data telah terhapus');window.location='../../inputorder.php'</script>";    
    }else{
        echo"Gagal menghapus data";
    }
    
?>
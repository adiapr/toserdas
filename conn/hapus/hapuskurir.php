<?php
    include("../koneksi.php");
    
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi,"DELETE FROM input_kurir WHERE id_kur=$id");
    
    if ($query){
        echo"<script> alert ('Data telah terhapus');window.location='../../inputkurir.php'</script>";    
    }else{
        echo"Gagal menghapus data";
    }
    
?>
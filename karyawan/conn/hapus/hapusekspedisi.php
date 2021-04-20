<?php
    include("../koneksi.php");
    
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi,"DELETE FROM kurir WHERE id_kurir=$id");
    
    if ($query){
        echo"<script> alert ('Data telah terhapus');window.location='../../formekspedisi.php'</script>";    
    }else{
        echo"Gagal menghapus data";
    }
    
?>
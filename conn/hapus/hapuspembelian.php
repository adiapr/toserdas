<?php
    include("../koneksi.php");
    
    $id = $_GET['id'];
    
    $query = mysqli_query($koneksi,"DELETE FROM pembelian WHERE id_pembelian=$id");
    
    if ($query){
        echo"<script> alert ('Data telah terhapus');window.location='../../formcustomer.php'</script>";    
    }else{
        echo"Gagal menghapus data";
    }
    
?>
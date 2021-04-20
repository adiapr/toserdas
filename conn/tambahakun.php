<?php

    include("koneksi.php");
    
    $akun   = $_POST['akun'];
    
    $query = ("INSERT INTO akun(nama_akun) VALUES('$akun')");
    $sql = mysqli_query($koneksi, $query);
    
    if($sql){
        echo "<script>alert('Akun berhasil ditambahkan'); window.location = '../formcustomer.php'</script>";
    } else {
        echo "data gagal ditambahkan";
    }
        

?>
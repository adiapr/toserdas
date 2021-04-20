<?php

    include("koneksi.php");
    
    $pembelian   = $_POST['pembelian'];
    
    $query = ("INSERT INTO pembelian(nama_pembelian) VALUES('$pembelian')");
    $sql = mysqli_query($koneksi, $query);
    
    if($sql){
        echo "<script>alert('Akun berhasil ditambahkan'); window.location = '../formcustomer.php'</script>";
    } else {
        echo "data gagal ditambahkan";
    }
        

?>
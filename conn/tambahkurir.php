<?php

    include("koneksi.php");
    
    $kurir   = $_POST['kurir'];
    $ekspedisi   = $_POST['ekspedisi'];
    $paket   = $_POST['paket'];
    
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $jam = date('H:i');
    
    $query = ("INSERT INTO input_kurir(nama_kurir,ekspedisi,tgl,jam,jmlpaket) VALUES('$kurir','$ekspedisi','$tanggal','$jam','$paket')");
    $sql = mysqli_query($koneksi, $query);
    
    if($sql){
        echo "<script>alert('Akun berhasil ditambahkan'); window.location = '../inputkurir.php'</script>";
    } else {
        echo "data gagal ditambahkan";
    }
        

?>
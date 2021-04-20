<?php

    include("koneksi.php");
    
    $ekspedisi   = $_POST['ekspedisi'];
    
    $query = ("INSERT INTO kurir(nama_kurir) VALUES('$ekspedisi')");
    $sql = mysqli_query($koneksi, $query);
    
    if($sql){
        echo "<script>alert('Akun berhasil ditambahkan'); window.location = '../formekspedisi.php'</script>";
    } else {
        echo "data gagal ditambahkan";
    }
        

?>
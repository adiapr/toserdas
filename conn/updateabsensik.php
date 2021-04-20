<?php
    include("koneksi.php");
    $tanggal = date('Y-m-d');
    $nama = $_POST['nama'];
    
    $query = mysqli_query($koneksi,"SELECT * from absensi where tanggal = '$tanggal' and username = '$nama'");
    $data = mysqli_fetch_array($query);
    
    $id = $data['id_absensi'];
    
    $keterangan = $_POST['keterangan'];
    

    $query = mysqli_query($koneksi,"UPDATE absensi set keterangan='$keterangan' where id_absensi='$id'");
  
    header("location:../konfirmasi.php");   
?>
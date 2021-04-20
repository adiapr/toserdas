<?php

    include("koneksi.php");
    
    $username   = $_POST['nama'];
    $alasan   = $_POST['alasan'];
    $keterangan   = $_POST['keterangan'];
    
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $jam = date('H:i');
    
    $query2 = mysqli_query($koneksi,"SELECT * from karyawan where username = '$username'");
    $data2 = mysqli_fetch_array($query2);
    $nama = $data2['nama_karyawan'];
    
    $query = ("INSERT INTO absensi(username,nama,tanggal,jam,status,absen,keterangan) VALUES('$username','$nama','$tanggal','$jam','2','$alasan','$keterangan')");
    $sql = mysqli_query($koneksi, $query);
    
    if($sql){
        echo "<script>alert('Data berhasil ditambahkan'); window.location = '../konfirmasi.php'</script>";
    } else {
        echo "data gagal ditambahkan";
    }
        

?>
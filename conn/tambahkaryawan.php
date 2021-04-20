<?php

include("koneksi.php");

$nama =$_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$tgl = date('dmY');



$query = ("INSERT INTO karyawan(nama_karyawan,username,password,role) VALUES('$nama','$username','$password','$role')");
$sql = mysqli_query($koneksi, $query);

if ($sql){
    echo"<script>alert('Data karyawan berhasil ditambahkan');
        window.location='../formkaryawan.php'</script>";

}else{
    echo"data gagal ditambahkan";
}
?>
<?php 
include '../con/koneksi.php';


$username = $_POST['username'];
$password = $_POST['pass'];
 
$query = mysqli_query($koneksi, "select * from karyawan where username='$username' and password='$password'");
$data = mysqli_fetch_array($query);

if (($data['username'] == $username) && ($data['password'] == $password) && $data['role'] == 'Manager'){
    session_start(); 
    $_SESSION['username'] = $username;  
    
    echo"<script>alert('Anda Berhasil Login');  window.location='../'</script>";
}else 
if (($data['username'] == $username) && ($data['password'] == $password) && $data['role'] == 'Karyawan'){
     
    
    
    echo"<script>alert('Anda tidak diizinkan masuk');  window.location='index.php'</script>";
}else{
    echo"<script>alert('Periksa kata sandi anda');  window.location='index.php'</script>";
}

?>
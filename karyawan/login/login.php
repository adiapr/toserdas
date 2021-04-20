<html>
    <head>
        <title>x</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        

       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<?php 
include '../con/koneksi.php';


$username = $_POST['username'];
$password = $_POST['pass'];
 
$query = mysqli_query($koneksi, "select * from karyawan where username='$username' and password='$password'");
$data = mysqli_fetch_array($query);

if (($data['username'] == $username) && ($data['password'] == $password)){
    session_start(); 
    $_SESSION['username'] = $username;  
    
    echo"<script>
      swal({ title: 'Hai ".$data['nama_karyawan']."',
         text: 'Selamat datang di toserdas, klik untuk melanjutkan',
         type: 'success'}).then(okay => {
           if (okay) {
            window.location.href = '../';
          }
        });
            </script>";
}else{
    echo"<script>
      swal({ title: 'Toserdas Menolak',
         text: 'Username dan password tidak sesuai',
         type: 'error'}).then(okay => {
           if (okay) {
            window.location.href = 'index.php';
          }
        });
            </script>";
}

?>
    </body>
</html>
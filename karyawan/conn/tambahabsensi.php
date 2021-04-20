<html>
    <head>
        <title>Redirect...</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    </head>
    <body>
        

       
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
<?php
    include("koneksi.php");
    
    $id = $_GET['id'];
    $query3 = mysqli_query($koneksi,"SELECT * from karyawan where id_karyawan = '$id' ");
    $data3 = mysqli_fetch_array($query3);
    
    $jadwal = $_POST['jadwal'];
    $tanggal = date('Y-m-d');
    $jam = date('H:i');
    
    $query = ("INSERT INTO absensi(username,nama,tanggal,jadwal,jam,status,absen) VALUES ('".$data3['username']."','".$data3['nama_karyawan']."','$tanggal','$jadwal','$jam','0','m')");
    $sql = mysqli_query($koneksi, $query);
    
    if($sql){
        echo "<script>
      swal({ title: 'Terimakasih',
         text: 'Absensi akan diverifikasi oleh admin',
         timer: 1000,
         showConfirmButton: false,
         type: 'success'}).then(okay => {
           if (okay) {
            window.location.href = '../';
          }
        });
            </script>";
    } else {
        echo "data gagal ditambahkan";
    }
?>

    </body>
</html>
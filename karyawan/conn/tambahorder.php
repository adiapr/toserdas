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
    
    $customer   = $_POST['customer'];
    $pembelian   = $_POST['pembelian'];
    $akun   = $_POST['akun'];
    $kurir = $_POST['kurir'];
    $admin = $_POST['admin'];
    
    date_default_timezone_set('Asia/Jakarta');
    $tanggal = date('Y-m-d');
    $jam = date('H:i');
    
    $query2 = mysqli_query($koneksi,"SELECT * from customer where nama = '".$_POST['customer']."'");
    $data2 = mysqli_fetch_array($query2);
    
    if($data2['nama'] == $_POST['customer'] && $data2['akun'] == $_POST['akun'] && $data2['pembelian'] == $_POST['pembelian'] && $data2['kurir'] == $_POST['kurir'] && $data2['admin'] == $_POST['admin'] ){
        echo "<script>
      swal({ title: 'Data sudah ada',
         text: 'Gunakan nama diikuti nomor untuk menyelesaikan masalah ini',
         type: 'error'}).then(okay => {
           if (okay) {
            window.location.href = '../inputorder.php';
          }
        });
            </script>";
    }else{
        $query = ("INSERT INTO customer(nama,akun,pembelian,kurir,admin,jam,tgl) VALUES('$customer','$akun','$pembelian','$kurir','$admin','$jam','$tanggal')");
        $sql = mysqli_query($koneksi, $query);
        
        if($sql){
            echo "<script>
            swal({ title: 'Terimakasih',
             text: 'Data toserdas berhasil ditambahkan!',
             timer: 1000,
             showConfirmButton: false,
             type: 'success'}).then(okay => {
               if (okay) {
                window.location.href = '../inputorder.php';
              }
            });
                </script>";
        } else {
            echo "data gagal ditambahkan";
        }    
    }
    
    
        

?>

    </body>
</html>
<?php 
    $tglawal    = $_POST['awal'];
    $tglakhir   = $_POST['akhir'];
    $jumlah     = $_POST['jumlah']; 
    $customer   = $_POST['customer'];
    $pembelian  = $_POST['pembelian'];
    $admin      = $_POST['admin'];
    
    
    echo"<script>alert('Pencarian berhasil');window.location='../reportcustomer.php?tglawal=$tglawal&tglakhir=$tglakhir&jumlah=$jumlah&customer=$customer&pembelian=$pembelian&admin=$admin'</script>";
?>
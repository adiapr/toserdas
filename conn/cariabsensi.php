<?php

$tglawal    = $_POST['awal'];
$tglakhir   = $_POST['akhir'];
$username   = $_POST['karyawan'];

header("location:../rekapabsensi.php?tanggalawal=$tglawal&tanggalakhir=$tglakhir&username=$username");

?>
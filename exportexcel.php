<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            
                                        <?php
                                            header("Content-type: application/vnd-ms-excel");
                                            header("Content-Disposition: attachment; filename=hasil.xls");
                                        ?>
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Customer</th>
                                                    <th>Akun</th>
                                                    <th>Pembelian</th>
                                                    <th>Kurir</th>
                                                    <th>Admin</th>
                                                    <th>Tanggal</th>
                                                    <th>Jam</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    if (($_GET['tglawal'] || $_GET['tglakhir']) != ''){
                                                        $tahun1 = substr($tglawal,0,4);
                                                        $bulan1 = substr($tglawal,5,2);
                                                        $tanggal1 = substr($tglawal,8,2);
                                                        $tahun2 = substr($tglakhir,0,4);
                                                        $bulan2 = substr($tglakhir,5,2);
                                                        $tanggal2 = substr($tglakhir,8,2);
                                                        $query5 = mysqli_query($koneksi, "select * from customer where tanggal between '$tanggal1-$bulan1-$tahun1' AND '$tanggal2-$bulan2-$tahun2' ORDER BY tanggal DESC");
                                                    }else{
                                                        $query5 = mysqli_query($koneksi, "select * from customer ORDER BY tanggal DESC");
                                                    }
                                                    while($data5 = mysqli_fetch_array($query5)){
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $data5['nama']  ?></td>
                                                    <td><?php echo $data5['akun'] ?></td>
                                                    <td><?php echo $data5['pembelian'] ?></td>
                                                    <td><?php echo $data5['kurir'] ?></td>
                                                    <td><?php echo $data5['admin'] ?></td>
                                                    <td><?php echo $data5['tanggal'] ?></td>
                                                    <td><?php echo $data5['jam'] ?></td>
                                                    <td class="center"><a href="con/hapus/hapusorder2.php?id=<?php echo $data5['id_custoner'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>

<?php
    include("inc/footer3.php");
?>
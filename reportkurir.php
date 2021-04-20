<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Rekap Order</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Rekap order data Toserdas
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal</th>
                                                    <th>Nama</th>
                                                    <th>Kurir</th>
                                                    <th>Jumlah Paket</th>
                                                    <th>Jam</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include("con/koneksi.php");
                                                    $no = 0 ;
                                                    $query5 = mysqli_query($koneksi, "select * from input_kurir ORDER BY tgl DESC");
                                                    while($data5 = mysqli_fetch_array($query5)){
                                                        $no++;
                                                ?>
                                                <tr class="odd gradeX">
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $data5['tgl'] ?></td>
                                                    <td><?php echo $data5['nama_kurir'] ?></td>
                                                    <td><?php echo $data5['ekspedisi'] ?></td>
                                                    <td><?php echo $data5['jmlpaket'] ?></td>
                                                    <td><?php echo $data5['jam'] ?></td>
                                                    <td class="center"><a href="con/hapus/hapuskurir.php?id=<?php echo $data5['id_kur'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <br><br>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
    include("inc/footer3.php");
?>
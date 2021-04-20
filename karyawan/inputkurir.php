<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Input Kurir</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/tambahkurir.php" method="post">
                                    <div class="form-group">
                                        <label>Nama Kurir</label>
                                        <input type="text" name="kurir" class="form-control">
                                    </div>
                                    <!--KURIR===================================================>-->
                                    <div class="form-group">
                                        <label>Ekspedisi</label>
                                        <select class="form-control" name="ekspedisi">
                                            <option>-- Pilih --</option>
                                            <?php
                                                include("con/koneksi.php");
                                                $tanggal = date('Y-m-d');
                                                $query4 = mysqli_query($koneksi, "select count(kurir) as jmlkurir,kurir from customer where tgl = '$tanggal' GROUP BY kurir");
                                                while($data4 = mysqli_fetch_array($query4)){
                                            ?>
                                            <option value="<?php echo $data4['kurir'] ?>">
                                                <?php echo $data4['kurir'] ?> (
                                                    <?php
                                                        date_default_timezone_set('Asia/Jakarta');
                                                        
                                                        $query5 = mysqli_query($koneksi,"select count(kurir) as jmlkurir from customer where tgl='$tanggal' and kurir='".$data4['kurir']."'");
                                                        $data5 = mysqli_fetch_array($query5);
                                                        
                                                        echo $data5['jmlkurir'];
                                                    ?>
                                                )
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Paket</label>
                                        <input type="number" name="paket" class="form-control" placeholder="Pastikan jumlah yang diambil sudah sesuai">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Kurir hari ini.
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Kurir</th>
                                                    <th>Ekspedisi</th>
                                                    <th>Jumlah</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $tanggal = date('Y-m-d');
                                                    $query5 = mysqli_query($koneksi, "select * from input_kurir where tgl='$tanggal' ORDER BY jam DESC limit 0,15");
                                                    while($data5 = mysqli_fetch_array($query5)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data5['jam'] ?></td>
                                                    <td><?php echo $data5['nama_kurir'] ?></td>
                                                    <td><?php echo $data5['ekspedisi'] ?></td>
                                                    <td><?php echo $data5['jmlpaket'] ?></td>
                                                    <td><a href="con/hapus/hapuskurir.php?id=<?php echo $data5['id_kur'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                     <!--/.table-responsive -->
                                     
                                </div>
                                <br><br>
                                 <!--/.panel-body -->
                            </div>
                    </div>
                     <!--/.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
    include("inc/footer2.php");
?>
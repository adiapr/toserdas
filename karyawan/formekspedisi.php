<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Ekspedisi</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/tambahekspedisi.php" method="post">
                                    <div class="form-group">
                                        <label>Tambah Ekspedisi</label>
                                        <input type="text" name="ekspedisi" class="form-control">
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
                                    List Ekspedisi
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Ekspedisi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM kurir");
                                                    $ii = 0;
                                                    while($data2 = mysqli_fetch_array($query2)){
                                                    $ii++;
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $ii ?></td>
                                                    <td><?php echo $data2['nama_kurir'] ?></td>
                                                    <td><a type="button" class="btn btn-danger btn-sm" href="con/hapus/hapusekspedisi.php?id=<?php echo $data2['id_kurir'] ?>" >Hapus</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                     <!--/.table-responsive -->
                                </div>
                                 <!--/.panel-body -->
                            </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
    include("inc/footer2.php");
?>
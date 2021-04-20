<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Form Customer</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/tambahakun.php" method="post">
                                    <div class="form-group">
                                        <label>Tambah Akun</label>
                                        <input type="text" name="akun" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary" value="Simpan">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    List Akun
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Toko</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $query = mysqli_query($koneksi, "SELECT * FROM akun");
                                                    $i = 0;
                                                    while($data = mysqli_fetch_array($query)){
                                                    $i++;
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $i ?></td>
                                                    <td><?php echo $data['nama_akun'] ?></td>
                                                    <td><a type="button" class="btn btn-danger btn-sm" href="con/hapus/hapusakun.php?id=<?php echo $data['id_akun'] ?>" >Hapus</a></td>
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
                    
                     <!--/.row -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/tambahpembelian.php" method="post">
                                    <div class="form-group">
                                        <label>Tambah Toko</label>
                                        <input type="text" name="pembelian" class="form-control">
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
                                    List Toko
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Toko</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM pembelian");
                                                    $ii = 0;
                                                    while($data2 = mysqli_fetch_array($query2)){
                                                    $ii++;
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $ii ?></td>
                                                    <td><?php echo $data2['nama_pembelian'] ?></td>
                                                    <td><a type="button" class="btn btn-danger btn-sm" href="con/hapus/hapuspembelian.php?id=<?php echo $data2['id_pembelian'] ?>" >Hapus</a></td>
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
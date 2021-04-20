<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Karyawan</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/tambahkaryawan.php" method="post">
                                    <div class="form-group">
                                        <label>Nama Karyawan</label>
                                        <input type="text" name="nama" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input class="form-control" type="text" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" type="text" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="role" value="Manager">Manager
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="role" value="Karyawan">Karyawan
                                        </label>
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
                                    Last Added Today
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama</th>
                                                    <th>Username</th>
                                                    <th>Password</th>
                                                    <th>Role</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM karyawan");
                                                    $ii = 0;
                                                    while($data2 = mysqli_fetch_array($query2)){
                                                    $ii++;
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $ii ?></td>
                                                    <td><?php echo $data2['nama_karyawan'] ?></td>
                                                    <td><?php echo $data2['username'] ?></td>
                                                    <td><?php echo $data2['password'] ?></td>
                                                    <td><?php echo $data2['role'] ?></td>
                                                    <td><a type="button" class="btn btn-danger btn-sm" href="con/hapus/hapuskaryawan.php?id=<?php echo $data2['id_karyawan'] ?>" >Hapus</a></td>
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
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
    include("inc/footer2.php");
?>
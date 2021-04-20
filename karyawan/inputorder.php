<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Input Order</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/tambahorder.php" method="post" id="inputan">
                                    <div class="form-group">
                                        <label>Nama Customer</label>
                                        <input type="text" name="customer" class="form-control" required>
                                    </div>
                                    <!--AKUN===================================================>-->
                                    <div class="form-group">
                                        <label>Akun</label><br>
                                        <?php
                                            include("con/koneksi.php");
                                            
                                            $query = mysqli_query($koneksi, "select * from akun");
                                            while($data = mysqli_fetch_array($query)){
                                                
                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="akun"  value="<?php echo $data['nama_akun'] ?>" required><?php echo $data['nama_akun'] ?>
                                        </label>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    
                                    <!-- PEMBELIAN===================================================>-->
                                    <div class="form-group">
                                        <label>Pembelian</label><br>
                                        <?php
                                            $query2 = mysqli_query($koneksi, "select * from pembelian");
                                            while($data2 = mysqli_fetch_array($query2)){
                                        ?>
                                        <label class="radio-inline">
                                            <input type="radio" name="pembelian" value="<?php echo $data2['nama_pembelian'] ?>" required><?php echo $data2['nama_pembelian'] ?>
                                        </label>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <!-- KURIR    ===================================================>-->
                                    <div class="form-group">
                                        <label>Kurir</label><br>
                                        <?php
                                            $query3 = mysqli_query($koneksi, "select * from kurir");
                                            while($data3 = mysqli_fetch_array($query3)){
                                        ?>
                                        <label class="radio-inline">    
                                            <input type="radio" name="kurir" value="<?php echo $data3['nama_kurir'] ?>" required><?php echo $data3['nama_kurir'] ?>
                                        </label>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <!--ADMIN ===================================================>-->
                                    <div class="form-group">
                                        <label>Admin</label>
                                        <select class="form-control" name="admin" required>
                                            <option value="">-- Pilih --</option>
                                            <?php
                                                $query4 = mysqli_query($koneksi, "select * from karyawan");
                                                while($data4 = mysqli_fetch_array($query4)){
                                            ?>
                                            <option value="<?php echo $data4['nama_karyawan'] ?>"><?php echo $data4['nama_karyawan'] ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
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
                                    3 order terakhir hari ini
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Admin</th>
                                                    <th>Customer</th>
                                                    <th>Pembelian</th>
                                                    <th>Kurir</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $tanggal = date('Y-m-d');
                                                    $query5 = mysqli_query($koneksi, "select * from customer where tgl='$tanggal' ORDER BY jam DESC limit 0,3");
                                                    while($data5 = mysqli_fetch_array($query5)){
                                                ?>
                                                <tr>
                                                    <td><?php echo $data5['jam'] ?></td>
                                                    <td><?php echo $data5['admin'] ?></td>
                                                    <td><?php echo $data5['nama'] ?></td>
                                                    <td><?php echo $data5['pembelian'] ?></td>
                                                    <td><?php echo $data5['kurir'] ?></td>
                                                    <td><a href="con/hapus/hapusorder.php?id=<?php echo $data5['id_custoner'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                     <!--/.table-responsive -->
                                     <br><br>
                                </div>
                                 <!--/.panel-body -->
                            </div>
                    </div>
                     <!--/.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
<script>
    $("#inputan").validate();
</script>
<?php
    include("inc/footer2.php");
?>
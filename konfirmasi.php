<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Kelola Absensi</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <form role="form" action="con/tambahketeranganabsensi.php" method="post">
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <label>Karyawan tidak masuk</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <select class="form-control" name="nama" required>
                                                        <option value="">Pilih Karyawan</option>
                                                        <?php
                                                            include("con/koneksi.php");
                                                            
                                                    
                                                            $tanggal = date('Y-m-d');
                                                            $query4 = mysqli_query($koneksi,"SELECT * from karyawan");
                                                            $query5 = mysqli_query($koneksi,"SELECT * from absensi where tanggal = '$tanggal'");
                                                            while ($data4 = mysqli_fetch_array($query4)){
                                                        ?>
                                                        <option value="<?php echo $data4['username'] ?>"><?php echo $data4['nama_karyawan'] ?></option>
                                                        <?php
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <select class="form-control" name="alasan" required>
                                                        <option value="">Pilih Alasan</option>
                                                        <option value="L">Libur</option>
                                                        <option value="s">Sakit</option>
                                                        <option value="i">Izin</option>
                                                        <option value="a">Tanpa Keterangan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12"><br>
                                                    <label>Keterangan</label>
                                                    <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan disini">    
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>    
                        </div>
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <form role="form" action="con/updateabsensik.php" method="post">
                                        <div class="form-group">
                                            <label>Karyawan datang</label>
                                            <select class="form-control" name="nama" required>
                                                <option value="">Pilih Karyawan</option>
                                                <?php
                                                    while ($data5 = mysqli_fetch_array($query5)){
                                                ?>
                                                <option value="<?php echo $data5['username'] ?>"><?php echo $data5['nama'] ?></option>
                                                <?php
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Keterangan</label>
                                            <input type="text" name="keterangan" class="form-control" placeholder="Masukkan keterangan disini">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>    
                        </div>
                        
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Karyawan yang sudah masuk hari ini
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Nama Karyawan</th>
                                                    <th>Jadwal Masuk</th>
                                                    <th>Jam Masuk</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    
                                                    
                                                    $ii = 0;
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM absensi where tanggal = '$tanggal'");
                                                    while($data2 = mysqli_fetch_array($query2)){
                                                    $ii++;
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $ii ?></td>
                                                    <td><?php echo $data2['nama'] ?></td>
                                                    <td>
                                                        <a href="" data-toggle="modal" data-target="#myModal<?php echo $data2['id_absensi'] ?>"><?php echo $data2['jadwal'] ?></a>
                                                        <div class="modal fade" id="myModal<?php echo $data2['id_absensi'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                        <h4 class="modal-title" id="myModalLabel"><?php echo $data2['nama'] ?></h4>
                                                                    </div>
                                                                    <form action="con/updatejadwal.php?id=<?php echo $data2['id_absensi'] ?>" method="post">
                                                                        <div class="modal-body">
                                                                            Edit jadwal masuk
                                                                            <input type="time" name="jadwal" value="08:00" class="form-control">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
                                                    </td>
                                                    <td><?php echo $data2['jam'] ?></td>
                                                    <td>
                                                        <?php 
                                                            if( $data2['status'] == 0 ){
                                                                echo"<button class='btn btn-warning btn-sm'>Menunggu konfirmasi</button>";
                                                            }else if( $data2['status'] == 1 ){
                                                                echo"<button class='btn btn-success btn-sm'>Telah dikonfirmasi</button>";
                                                            }
                                                            else if( $data2['status'] == 2 ){
                                                                echo"<button class='btn btn-danger btn-sm'>Tidak masuk</button>";
                                                            }
                                                        ?>
                                                    
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($data2['absen'] != 'm'){
                                                            echo"( ".$data2['absen']." ) ";
                                                            }
                                                        ?>
                                                        <?php
                                                            if($data2['absen'] == 'L'){
                                                                echo"Libur";
                                                            }else{
                                                                echo $data2['keterangan'];
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        if( $data2['status'] == 0 ){
                                                        ?>
                                                            <a type="button" class="btn btn-success btn-sm" href="con/konfirmasi.php?id=<?php echo $data2['id_absensi'] ?>" >Konfirmasi</a>
                                                            <a type="button" class="btn btn-danger btn-sm" href="con/hapus/tolak.php?id=<?php echo $data2['id_absensi'] ?>" >Tolak</a>
                                                        <?php
                                                        }else{
                                                        ?>
                                                            <a type="button" class="btn btn-danger btn-sm" href="con/hapus/tolak.php?id=<?php echo $data2['id_absensi'] ?>" ><i class="fa fa-trash-o"></i> Hapus</a>
                                                        
                                                        <?php
                                                        }
                                                        ?>
                                                    </td>
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
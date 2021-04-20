<div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        
                        <ul class="nav" id="side-menu">
                            <li class="sidebar-search">
                                <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div>
                                <!-- /input-group -->
                            </li>
                            <li>
                                <h4 align="center">
                                    <script>
                                        arrbulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
                                        date = new Date();
                                        tanggal = date.getDate();
                                        bulan = date.getMonth();
                                        tahun = date.getFullYear();
                                        document.write(tanggal+" "+arrbulan[bulan]+" "+tahun);
                                    </script><br><br>
                                    <?php
                                        $tanggal = date('Y-m-d');
                                        $query3 = mysqli_query($koneksi,"select * from absensi where username = '".$data9['username']."' AND tanggal='$tanggal'");
                                        $data3 = mysqli_fetch_array($query3);
                                        
                                        if($data3['status'] == ''){
                                    ?>
                                    <botton class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">Absensi</botton>
                                    <?php
                                        }else if($data3['status'] == '0'){
                                    ?>
                                    <button class="btn btn-warning btn-sm">Menunggu Verifikasi</button>
                                    <?php
                                        }else{
                                    ?>
                                    <button class="btn btn-success btn-sm">Sudah Melakukan Absen</button>
                                    <?php
                                        }
                                    ?>
                                </h4>
                            </li>
                                    <!-- Modal -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                    <h4 class="modal-title" id="myModalLabel">Jadwal Masuk</h4>
                                                </div>
                                                <form action="con/tambahabsensi.php?id=<?php echo $data9['id_karyawan'] ?>" method="post">
                                                    <div class="modal-body">
                                                        Silahkan masukkan jadwal masuk anda hari ini ya.<br>
                                                        ex. 08.00, 10.00, 12.00<br>
                                                        <b>Semangat Bekerja !</b>
                                                        <input name="jadwal" type="time" class="form-control" value="09:00" required>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                            
                            
                            <br>
                            <li>
                                <a href="index.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <li>
                                <a href="inputorder.php"><i class="fa fa-cart-plus fa-fw"></i> Input Order</a>
                            </li>
                            <li>
                                <a href="inputkurir.php"><i class="fa fa-truck fa-fw"></i> Input Kurir</a>
                            </li>
                            <br>
                            <br>    
                            <br>
                           
                                    <li>
                                        <a href="reportcustomer.php"><i class="fa fa-file fa-fw"></i>Laporan Customer</a>
                                    </li>
                                    <li>
                                        <a href="reportkurir.php"><i class="fa fa-file fa-fw"></i>Laporan Kurir</a>
                                    </li>
                              
                            <br><br><br>
                            <li>
                                <a href="https://programmerindo.com" target="_blank" class="active"><i class="fa fa-support fa-fw"></i> Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
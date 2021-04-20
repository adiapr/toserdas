<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Rekap Absensi</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <?php
                        $tanggalawal = $_GET['tanggalawal'];
                        $tanggalakhir = $_GET['tanggalakhir'];
                        $username = $_GET['username'];
                    ?>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/cariabsensi.php" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Awal</label>
                                                <input type="date" name="awal" class="form-control" <?php if($tanggalawal != ''){ echo "value='$tanggalawal'"; } ?> required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tanggal Akhir</label>
                                                <input type="date" name="akhir" class="form-control" <?php if($tanggalakhir != ''){ echo "value='$tanggalakhir'"; } ?> required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Karyawan===================================================>-->
                                    <div class="form-group">
                                        <label>Pilih Karyawan</label>
                                        <select class="form-control" name="karyawan" required>
                                            <option value="">-- Pilih --</option>
                                            <?php
                                                include("con/koneksi.php");
                                                $tanggal = date('Y-m-d');
                                                $query4 = mysqli_query($koneksi, "select * from karyawan");
                                                while($data4 = mysqli_fetch_array($query4)){
                                            ?>
                                            <option value="<?php echo $data4['username'] ?>">
                                                <?php echo $data4['nama_karyawan'] ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
                                        <button onclick="printContent('div1')" class="btn btn-success" ><i class="fa fa-print"></i> Print</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <?php
                        if($username != ''){
                    ?>
                    <!-- /.row -->
                    <div class="row" id="div1">
                        
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    Rekap absensi | Toserdas Team
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <table border="0" width="100%">
                                        <tr width="100%">
                                            <td>
                                                <?php
                                                    $query7 = mysqli_query($koneksi,"SELECT * from absensi where tanggal between '$tanggalawal' AND '$tanggalakhir' and username = '$username'");
                                                    $data7 = mysqli_fetch_array($query7);
                                                    $hariawal = substr($tanggalawal,8,2);
                                                    $bulanawal = substr($tanggalawal,5,2);
                                                    $tahunawal = substr($tanggalawal,0,4);
                                                    $hariakhir = substr($tanggalakhir,8,2);
                                                    $bulanakhir = substr($tanggalakhir,5,2);
                                                    $tahunakhir = substr($tanggalakhir,0,4);
                                                ?>
                                                <h3 style="margin-top:1px;"><?php echo $data7['nama'] ?></h3>
                                                Periode : <?php echo $hariawal ?>/<?php echo $bulanawal ?>/<?php echo $tahunawal ?> - <?php echo $hariakhir ?>/<?php echo $bulanakhir ?>/<?php echo $tahunakhir ?>
                                            </td>
                                            <td align="right"><img src="image/logo  small.png"></td>
                                        </tr>
                                    </table>
                                    <hr style="height:3px;" >
                                    <b>
                                        <?php
                                            $query8 = mysqli_query($koneksi,"SELECT count(absen) as m from absensi where tanggal between '$tanggalawal' AND '$tanggalakhir' and username = '$username' AND absen = 'm'");
                                            $data8 = mysqli_fetch_array($query8); 
                                            $query9 = mysqli_query($koneksi,"SELECT count(absen) as s from absensi where tanggal between '$tanggalawal' AND '$tanggalakhir' and username = '$username' AND absen = 's'");
                                            $data9 = mysqli_fetch_array($query9);
                                            $query10 = mysqli_query($koneksi,"SELECT count(absen) as i from absensi where tanggal between '$tanggalawal' AND '$tanggalakhir' and username = '$username' AND absen = 'i'");
                                            $data10 = mysqli_fetch_array($query10);
                                            $query11 = mysqli_query($koneksi,"SELECT count(absen) as a from absensi where tanggal between '$tanggalawal' AND '$tanggalakhir' and username = '$username' AND absen = 'a'");
                                            $data11 = mysqli_fetch_array($query11);
                                            $query12 = mysqli_query($koneksi,"SELECT count(absen) as l from absensi where tanggal between '$tanggalawal' AND '$tanggalakhir' and username = '$username' AND absen = 'L'");
                                            $data12 = mysqli_fetch_array($query12);
                                        ?>
                                    <table>
                                        <tr>
                                            <td>Masuk</td>
                                            <td> : 
                                                <?php
                                                    if($data8['m'] == ''){
                                                        echo" - ";
                                                    }else{
                                                    echo $data8['m'] ;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Libur Wajib</td>
                                            <td> : 
                                                <?php
                                                    if($data12['l'] == ''){
                                                        echo" - ";
                                                    }else{
                                                    echo $data12['l'] ;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Izin</td>
                                            <td> : 
                                                <?php
                                                    if($data10['i'] == ''){
                                                        echo" - ";
                                                    }else{
                                                    echo $data10['i'] ;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Sakit</td>
                                            <td> : 
                                                <?php
                                                    if($data9['s'] == ''){
                                                        echo" - ";
                                                    }else{
                                                    echo $data9['s'] ;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tanpa Keterangan &nbsp;</td>
                                            <td> : 
                                                <?php
                                                    if($data11['a'] == ''){
                                                        echo" - ";
                                                    }else{
                                                    echo $data11['a'] ;
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    </b>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Tanggal</th>
                                                    <th>Jadwal Masuk</th>
                                                    <th>Jam Absen</th>
                                                    <th>Status</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $tanggal = date('Y-m-d');
                                                    $no = 0;
                                                    $query5 = mysqli_query($koneksi, "select * from absensi where tanggal BETWEEN '$tanggalawal' AND '$tanggalakhir' and username='$username' ORDER BY id_absensi DESC");
                                                    while($data5 = mysqli_fetch_array($query5)){
                                                        $no++;
                                                ?>
                                                <tr>
                                                    <td><?php echo $no ?></td>
                                                    <td><?php echo $data5['tanggal'] ?></td>
                                                    <td><?php echo $data5['jadwal'] ?></td>
                                                    <td><?php 
                                                            if($data5['absen'] != 'm'){
                                                                echo" - ";
                                                            }else{
                                                                echo $data5['jam'];
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if($data5['absen'] == 'm'){
                                                                if($data5['status'] == 1){
                                                                    echo"(M) Terkonfirmasi";
                                                                }else{
                                                                    echo"(M) Belum Terkonfirmasi";
                                                                }
                                                            }else if($data5['absen'] == 's'){
                                                                echo"Sakit";
                                                            }else if($data5['absen'] == 'i'){
                                                                echo"Izin";
                                                            }else if($data5['absen'] == 'a'){
                                                                echo"Tanpa Keterangan";
                                                            }else if($data5['absen'] == 'L'){
                                                                echo"Libur Wajib";
                                                            }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php 
                                                            if($data5['keterangan'] == ''){
                                                                echo " - ";
                                                            }else{
                                                                echo $data5['keterangan'];        
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
                                <br><br>
                                 <!--/.panel-body -->
                            </div>
                    </div>
                     <!--/.row -->
                     <?php
                        }
                     ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

<?php
    include("inc/footer2.php");
?>
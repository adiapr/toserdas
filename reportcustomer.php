<?php
    include("inc/header.php");
    include("inc/sidebar.php");
    include("conn/koneksi.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Laporan Order</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <?php
                            $tanggalawal = date('Y-m-d');
                            $tanggalakhir = date('Y-m-d', strtotime(date('Y-m') . '- 1 month'));
                            $tglawal = $_GET['tglawal'];
				            $tglakhir = $_GET['tglakhir'];
				            $customer = $_GET['customer'];
				            $jumlah = $_GET['jumlah'];
				            $pembelian  = $_GET['pembelian'];
				            $admin      = $_GET['admin'];
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <form role="form" action="con/filtercustomer.php" method="post">
                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Tanggal awal</label>
                                                <input class="form-control" type="date" name="awal" value="<?php if($tglawal != ''){ echo $tglawal; }else{ echo $tanggalakhir; } ?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Customer</label>
                                                <input class="form-control" type="text" name="customer" value="<?php if($customer != ''){echo $customer; } ?>" placeholder="Filter customer...">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Admin</label>
                                                <input class="form-control" type="text" value="<?php if($admin != ''){echo $admin; } ?>" name="admin" placeholder="Filter admin...">
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                             <div class="form-group">
                                                <label>Tanggal akhir</label>
                                                <input class="form-control" type="date" value="<?php if($tglakhir != ''){ echo $tglakhir; }else{ echo $tanggalawal; } ?>" name="akhir" >
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label>Pembelian</label>
                                            <input class="form-control" type="text" name="pembelian" value="<?php if($pembelian != ''){echo $pembelian; } ?>" placeholder="Filter pembelian...">
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Jumlah data</label>
                                                <input class="form-control" type="number" <?php if ($jumlah != '' ){ echo" value='$jumlah'";} ?> name="jumlah" placeholder="Jumlah data yang ditampilkan">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary">Cari Data</button>
                                            <a class="btn btn-danger" href="reportcustomer.php">Reset</a>    
                                        </div>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                             <a class="btn btn-success" target="_blank" href="cetak.php?status=<?php echo $status  ?>&nama=<?php echo $nama ?>&bagian=<?php echo $bagian ?>&tglawal=<?php echo $tglawal ?>&tglakhir=<?php echo $tglakhir ?>&halaman=<?php echo $x ?>&jumlah=<?php echo $jumlah ?>" style="float:right;"><i class="fa fa-print"></i> Cetak</a>    
                                        </div>
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="panel panel-default">
                                <div class="panel-heading">
                                    List jobdesk
                                </div>
                                 <!--/.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
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
                                                    include("conn/koneksi.php");
                                                    
                                                    if ($_GET['jumlah'] ==''){
                                                        $batas = 10 ;    
                                                    }else{
                                                        $batas = $_GET['jumlah'];
                                                    }
                                                    $halaman_aktif = $_GET['halaman'];
                                                    $halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                                    $halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;
                                                    
                                                    $previous = $halaman - 1;
				                                    $next = $halaman + 1;
				                                    
				                                    if ($status == ''){
                                                    $query3 = mysqli_query($koneksi, "SELECT * FROM customer");
				                                    }else{
				                                        $query3 = mysqli_query($koneksi, "SELECT * FROM customer where status = '$status'");
				                                    }
				                                    
                                                    $jumlah_data = mysqli_num_rows($query3);
                                                    $total_halaman = ceil($jumlah_data / $batas);
                                                    
                                                    // --------------------Filter pencarian -------------------------------------
                                                    if ($status == '' && $tglawal == '' && $tglakhir == '' && $bagian == '' && $nama == '' ){
                                                    $query2 = mysqli_query($koneksi, "SELECT * FROM customer order by id_custoner desc limit $halaman_awal, $batas");
                                                    }else
                                                    if ($tglawal != '' && $tglakhir != ''){
                                                        $awal= $_GET['tglawal'];
                                                        $akhir= $_GET['tglakhir'];
                                                        $query2 = mysqli_query($koneksi, "SELECT * FROM customer where tgl between '$awal' and '$akhir' order by  id_custoner desc limit $halaman_awal, $batas");
                                                        if ($customer != '' && $tglawal != '' && $tglakhir != ''){
                                                            $query2 = mysqli_query($koneksi, "SELECT * FROM customer where tgl between '$awal' and '$akhir' and nama = '$customer' order by  id_custoner desc limit $halaman_awal, $batas");
                                                        }else
                                                        if ($pembelian != '' ){
                                                            $query2 = mysqli_query($koneksi, "SELECT * FROM customer where tgl between '$awal' and '$akhir' and pembelian = '$pembelian' order by  id_custoner desc limit $halaman_awal, $batas");
                                                        }else
                                                        if ($admin != '' ){
                                                            $query2 = mysqli_query($koneksi, "SELECT * FROM customer where tgl between '$awal' and '$akhir' and admin = '$admin' order by id_custoner desc limit $halaman_awal, $batas");
                                                        }
                                                        
                                                    }
                                                    
                                                    
                                                    
                                                    $nomor = $halaman_awal+1;
                                                    $ii = 0;
                                                    while($data2 = mysqli_fetch_array($query2)){
                                                    $ii++;
                                                    
                                                ?>
                                                <tr>
                                                    <td><?php echo $ii ?></td>
                                                    <td><?php echo $data2['nama']  ?></td>
                                                    <td><?php echo $data2['akun'] ?></td>
                                                    <td><?php echo $data2['pembelian'] ?></td>
                                                    <td><?php echo $data2['kurir'] ?></td>
                                                    <td><?php echo $data2['admin'] ?></td>
                                                    <td><?php echo $data2['tgl'] ?></td>
                                                    <td><?php echo $data2['jam'] ?></td>
                                                    <td class="center"><a href="con/hapus/hapusorder2.php?id=<?php echo $data2['id_custoner'] ?>" class="btn btn-danger btn-sm">Hapus</a></td>
                                                </tr>
                                                <?php
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                        <nav>
                                			<ul class="pagination justify-content-center">
                                				<li class="page-item">
                                					<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$Previous'"; } ?>>Previous</a>
                                				</li>
                                				<?php
                                				for ($x=1;$x<=3;$x++){
                                    				if($x != $halaman_aktif){
                                    					?> 
                                    					<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    					<?php
                                    				}else{
                                    				    ?>
                                    				    <li class="page-item active"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                                    				<?php
                                    				}
                                				}
                                				?>
                                				<li class="page-item">
                                				    <a  class="page-link">...</a></li>
                                				<li class="page-item">
                                					<a  class="page-link" href="?halaman=<?php echo $total_halaman ?>" ><?php echo $total_halaman ?></a>
                                				</li>
                                				<li class="page-item">
                                					<a  class="page-link" <?php  echo "href='?halaman=$next'";  ?>>Next</a>
                                				</li>
                                			</ul>
                                		</nav>
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
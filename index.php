
<?php
    include("inc/header.php");
    include("inc/sidebar.php");
?>
                

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Dashboard</h1>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-users fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php
                                                    include("con/koneksi.php");
                                                    
    date_default_timezone_set('Asia/Jakarta');
                                                    
                                                    $query = mysqli_query($koneksi, "SELECT COUNT(nama_karyawan) as karyawan FROM karyawan");
                                                    $data = mysqli_fetch_array($query);
                                                    
                                                    echo $data['karyawan'];
                                                ?>
                                            </div>
                                            <div>Karyawan</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#karyawan">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-laptop fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $tanggal = date('Y-m-d');
                                                    
                                                    $query3 = mysqli_query($koneksi, "SELECT COUNT(nama) as nama FROM customer where tgl='$tanggal'");
                                                    $data3 = mysqli_fetch_array($query3);
                                                    
                                                    echo $data3['nama'];
                                                ?> 
                                            </div>
                                            <div>Order hari ini</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#penjualanharian">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $tanggal = date('Y-m');
                                                    
                                                    $query4 = mysqli_query($koneksi, "SELECT COUNT(nama) as nama FROM customer where tgl LIKE '$tanggal%'");
                                                    $data4 = mysqli_fetch_array($query4);
                                                    
                                                    echo $data4['nama'];
                                                ?>
                                            </div>
                                            <div>Order bulan ini</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-tasks fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">
                                                <?php
                                                    include("con/koneksi.php");
                                                    
                                                    $tanggal = date('m-Y');
                                                    
                                                    $query5 = mysqli_query($koneksi, "SELECT COUNT(nama) as nama FROM customer");
                                                    $data5 = mysqli_fetch_array($query5);
                                                    
                                                    echo $data5['nama'];
                                                ?>
                                            </div>
                                            <div>Total semua order</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> Laporan penjualan Bulanan
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Actions
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li><a href="#">Action</a>
                                                </li>
                                                <li><a href="#">Another action</a>
                                                </li>
                                                <li><a href="#">Something else here</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <canvas id="grafikBatang"></canvas>
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <div class="panel panel-default"  id="penjualanharian">
                                <div class="panel-heading">
                                    <i class="fa fa-bar-chart-o fa-fw"></i> laporan penjualan harian
                                    <div class="pull-right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-xs dropdown-toggle"
                                                    data-toggle="dropdown">
                                                Actions
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu pull-right" role="menu">
                                                <li><a href="#">Action</a>
                                                </li>
                                                <li><a href="#">Another action</a>
                                                </li>
                                                <li><a href="#">Something else here</a>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Admin</th>
                                                        <th>Customer</th>
                                                        <th>Pembelian</th>
                                                        <th>Kurir</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $tanggal = date('Y-m-d');
                                                        $query5 = mysqli_query($koneksi, "select * from customer where tgl='$tanggal' ORDER BY jam DESC limit 0,11");
                                                        while($data5 = mysqli_fetch_array($query5)){
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $data5['jam'] ?></td>
                                                        <td><?php echo $data5['admin'] ?></td>
                                                        <td><?php echo $data5['nama'] ?></td>
                                                        <td><?php echo $data5['pembelian'] ?></td>
                                                        <td><?php echo $data5['kurir'] ?></td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- /.table-responsive -->
                                        
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-8">
                                            <div id="morris-bar-chart"></div>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                                <div class="panel-body">
                                    
                                </div>
                            </div>
                            <!-- /.panel -->
                            
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-8 -->
                        <div class="col-lg-4">
                            
                            <!-- /.panel -->
                            <div class="panel panel-default">
                               
                                <div class="panel-body">
                                    <canvas id="grafikPembelian" style="height:700px;"></canvas>
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <b>Berdasarkan akun</b>
                                    <canvas id="grafikAkun"></canvas>
                                </div>
                                
                                <!-- /.panel-footer -->
                            </div>
                            <div class="chat-panel panel panel-default">
                                <div class="panel-body">
                                    <h4 id="karyawan">Toserdas Team</h4>
                                    <b>
                                    <ul>
                                        <?php
                                            $query3 = mysqli_query ($koneksi, "SELECT * from karyawan");
                                            while($data3=mysqli_fetch_array($query3)){
                                        ?>
                                        <li><?php echo $data3['nama_karyawan'] ?></li>
                                        <?php
                                            }
                                        ?>
                                    </ul>
                                    </b>
                                    
                                </div>
                                
                                <!-- /.panel-footer -->
                            </div>
                            <!-- /.panel .chat-panel -->
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->


<?php
    include("inc/footer.php");
?>
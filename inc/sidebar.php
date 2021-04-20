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
                                    </script>
                                </h4>
                            </li>
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
                            <li>
                                <a href="#"><i class="fa fa-users fa-fw"></i> Absensi<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="konfirmasi.php">Kelola Absensi</a>
                                    </li>
                                    <li>
                                        <a href="rekapabsensi.php">Rekap Data</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <br><br><br>
                            <li>
                                <a href="#"><i class="fa fa-file fa-fw"></i> Laporan<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="reportcustomer.php">Customer</a>
                                    </li>
                                    <li>
                                        <a href="reportkurir.php">Kurir</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-sitemap fa-fw"></i>Manajemen Toko<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="formkaryawan.php">Karyawan</a>
                                    </li>
                                    <li>
                                        <a href="formekspedisi.php">Ekspedisi</a>
                                    </li>
                                    <li>
                                        <a href="formcustomer.php">Form Customer</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="https://programmerindo.com" target="_blank" class="active"><i class="fa fa-support fa-fw"></i> Support</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
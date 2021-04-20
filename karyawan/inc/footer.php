
        </div>
        <?php
            include("footnav.php");
        ?>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Morris Charts JavaScript -->
        <!--<script src="js/raphael.min.js"></script>-->
        <!--<script src="js/morris.min.js"></script>-->
        <!--<script src="js/morris-data.js"></script>-->

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>
<script>

<?php
    include ("con/koneksi.php");
    $tanggal = date('Y-m');
    
?>

var ctx = document.getElementById("grafikBatang").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    // options: options,
    data: {
        labels: [
            <?php
                $query99 = mysqli_query($koneksi, "select  SUBSTRING(tgl,9,2) as hari from customer  WHERE tgl LIKE '$tanggal%' GROUP BY tgl");
                while($data99 = mysqli_fetch_array($query99)){
            ?>
            "<?php echo $data99['hari'] ?>",
            <?php
                }
            ?>
            ],
        datasets: [{
            label: '# <?php echo $tanggal ?>',
            data: [
                <?php
                    $query98 = mysqli_query($koneksi, "SELECT COUNT(tgl)  as jml FROM customer WHERE tgl LIKE '$tanggal%' GROUP BY tgl");
                    while($data98 = mysqli_fetch_array($query98)){
                ?>
                <?php echo $data98['jml'] ?>,
                <?php
                    }
                ?>
                ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
        
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});

</script>

<script>
var ctx = document.getElementById("grafikPembelian").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php
                    $query97 = mysqli_query($koneksi, "SELECT pembelian, COUNT(pembelian) as jml FROM customer WHERE tgl LIKE '$tanggal%' GROUP BY pembelian");
                    while($data97 = mysqli_fetch_array($query97)){
            ?>
            "<?php echo $data97['pembelian'] ?>",
            <?php
                }
            ?>
            
            ],
        datasets: [{
            label: '#Pembelian bulan ini',
            data: [
                <?php
                $query97 = mysqli_query($koneksi, "SELECT pembelian, COUNT(pembelian) as jml FROM customer WHERE tgl LIKE '$tanggal%' GROUP BY pembelian");
                    while($data97 = mysqli_fetch_array($query97)){
                ?>
                <?php echo $data97['jml'] ?>,
                <?php
                    }
                ?>
                ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>

<script>
var ctx = document.getElementById("grafikAkun").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: [
            <?php
                    $query96 = mysqli_query($koneksi, "SELECT akun, COUNT(akun) as jml FROM customer WHERE tgl LIKE '$tanggal%' GROUP BY akun");
                    while($data96 = mysqli_fetch_array($query96)){
            ?>
            "<?php echo $data96['akun'] ?>",
            <?php
                }
            ?>
            
            ],
        datasets: [{
            label: '#Pembelian bulan ini',
            data: [
                <?php
                $query96 = mysqli_query($koneksi, "SELECT akun, COUNT(akun) as jml FROM customer WHERE tgl LIKE '%$tanggal%' GROUP BY akun");
                    while($data96 = mysqli_fetch_array($query96)){
                ?>
                <?php echo $data96['jml'] ?>,
                <?php
                    }
                ?>
                ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>




    </body>
</html>

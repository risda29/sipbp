<?= $this->extend('template/template-kepala sekolah') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Grafik Peminjaman Barang</h1>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <canvas id="myChart" width="400" height="400"></canvas>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->

    <!-- Load Chart.js from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Sudah dikembalikan', 'Belum diKembalikan'],
                datasets: [{
                    label: 'Status Barang',
                    data: [<?= $barangDikembalikan ?>, <?= $barangBelumDikembalikan ?>], // Misalkan 80% sudah kembalikan, 20% belum dikembalikan
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)', // Biru untuk sudah dikembalikan
                        'rgba(255, 99, 132, 0.6)' // Merah untuk belum dikembalikan
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw.toFixed(2) + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
</section>
<!-- /.content -->

<?= $this->endSection() ?>

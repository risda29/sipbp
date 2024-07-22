<?= $this->extend('template/template-kepala sekolah') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Laporan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row mb-3">
            <div class="col text-end">
                <button class="btn btn-primary btn-print" onclick="window.print()">
                    <i class="fas fa-print"></i> Cetak Laporan
                </button>
            </div>
        </div>

        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama/Jenis Barang</th>
                        <th scope="col">Jumlah Barang</th>
                        <th scope="col">Layak</th>
                        <th scope="col">Tidak Layak</th>
                        <th scope="col">Rusak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($DataBarang as $index => $item): ?>
                        <tr>
                            <td><?= $index + 1 ?></td>
                            <td><?= $item['nama_barang'] ?></td>
                            <td><?= $item['total_stok'] ?></td>
                            <td><?= $item['total_layak'] ?></td>
                            <td><?= $item['total_tidak_layak'] ?></td>
                            <td><?= $item['total_rusak'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!-- ./row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
<?= $this->endSection() ?>
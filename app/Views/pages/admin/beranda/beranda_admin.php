<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Beranda
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <!-- Bisa menambahkan konten di sini jika diperlukan -->
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3 class="text-center">Pengguna</h3>
                            <h3 class="text-center"><?php echo $pengguna
                                ?></h3>
                        </div>
                        <!-- Tambahkan ikon di sini jika ada -->
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3 class="text-white text-center">Kelas<sup style="font-size: 20px"></sup></h3>
                        <h3 class="text-center"><?php echo $kelas
                            ?></h3>
                    </div>
                    <div class="icon">
                        <!-- Tambahkan ikon di sini jika ada -->
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 class="text-white text-center">Peminjaman</h3>
                        <h3 class="text-white text-center"><?php echo $peminjaman
                            ?></h3>
                    </div>
                    <div class="icon">
                        <!-- Tambahkan ikon di sini jika ada -->
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 class="text-center">Barang</h3>
                        <h3 class="text-center"><?php echo $pengguna
                            ?></h3>
                    </div>
                    <div class="icon">
                        <!-- Tambahkan ikon di sini jika ada -->
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection() ?>
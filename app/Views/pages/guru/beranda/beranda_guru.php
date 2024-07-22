<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Beranda</h1>
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
        <div class="row">
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3 class="text-center">Peminjaman</h3>
                        <h3 class="text-center"><?php echo $peminjamandiacc
                         ?></h3>
                        <h3 class="text-center">Telah Acc</h3>
                    </div>
                    <div class="icon">
                        <!-- Tambahkan ikon di sini jika ada -->
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 class="text-center">Peminjaman</h3>
                        <h3 class="text-center"><?php echo $peminjamanbelumdiacc
                         ?></h3>
                        <h3 class="text-center">Belum Acc</h3>
                    </div>
                    <div class="icon">
                        <!-- Tambahkan ikon di sini jika ada -->
                    </div>
                    <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
         
            <!-- ./col -->
        </div>
        <!-- /.container-fluid -->
</section>

<?= $this->endSection() ?>
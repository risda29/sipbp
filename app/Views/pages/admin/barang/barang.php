<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Barang</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="mb-3 text-end">
            <a href="/admin/barang/tambah" type="button" class="btn btn-success justify-content-end">Tambah</a>
        </div>
        <?php if (session('pesan')) : ?>
            <div class="card bg-gradient-primary">
                <div class="card-body">
                    <?php echo session('pesan') ?>
                </div>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Barang Master</th>
                    <th scope="col">Kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kondisi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1 ?>
            <?php foreach($barang as $item) : ?>
                <?php if ($item['stok_barang'] > 0) : ?>
                    <tr>
                        <th scope="row"><?php echo $i++ ?></th>
                        <td><?php echo $item['kode_barang_master'] ?></td>
                        <td><?php echo $item['kode_barang'] ?></td>
                        <td><?php echo $item['nama_barang'] ?></td>
                        <td><?php echo $item['kondisi_barang'] ?></td>
                        <td>
                            <a href="/admin/barang/hapus/<?php echo $item['id_barang'] ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endif; ?>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>

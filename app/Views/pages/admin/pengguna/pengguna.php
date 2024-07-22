<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Pengguna</h1>
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
        <div class="mb-3 text-end">
            <a href="/admin/pengguna/tambah" type="button" class="btn btn-success justify-content-end">Tambah</a>
        </div>
        <?php if (session('pesan')) : ?>
            <div class="card bg-gradient-primary">
                <!-- /.card-header -->
                <div class="card-body">
                    <?php echo session('pesan') ?>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        <?php endif; ?>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">No HP</th>
                    <th scope="col">Email</th>
                    <th scope="col">Level</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
                <?php foreach ($pengguna as $item) : ?>
                    <tr>
                    <th scope="row"><?= $no++; ?></th>
                        <td><?php echo $item['nama_pengguna'] ?></td>
                        <td><?php echo $item['nip'] ?></td>
                        <td><?php echo $item['alamat'] ?></td>
                        <td><?php echo $item['no_hp'] ?></td>
                        <td><?php echo $item['email'] ?></td>
                        <td><?php echo $item['level'] ?></td>
                        <td>
                            <a href="/admin/pengguna/edit/<?php echo $item['id_pengguna'] ?>" type="button" class="btn btn-info justify-content-end text-white">Edit</a>
                            <a href="/admin/pengguna/hapus/<?php echo $item['id_pengguna'] ?>" class="btn btn-danger">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>

    </div>

</section>
<?= $this->endSection() ?>
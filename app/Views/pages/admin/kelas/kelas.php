<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Kelas</h1>
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
            <a href="/admin/kelas/tambah" type="button" class="btn btn-success justify-content-end">Tambah</a>
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
                    <th scope="col">Kelas</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Jumlah Siswa</th>
                    <th scope="col">Aksi </th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; ?>
            <?php foreach ($kelas as $item) : ?>
                <tr>
                <th scope="row"><?= $no++; ?></th>
                    <td> <?php echo $item['nama_kelas'] ?></td>
                    <td><?php echo $item['jurusan'] ?></td>
                    <td><?php echo $item['jumlah_siswa'] ?></td>

                    <td>
                    <a href="/admin/kelas/edit/<?php echo $item['id_kelas'] ?>" type="button" class="btn btn-info justify-content-end text-white">Edit</a>
                    <a href="/admin/kelas/hapus/<?php echo $item['id_kelas'] ?>" class="btn btn-danger">Hapus</button>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>

    </div>

</section>
<?= $this->endSection() ?>
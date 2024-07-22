<?= $this->extend('template/template-guru') ?>
<?= $this->section('content') ?>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Kelola Peminjaman</h1>
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
            <a href="/guru/peminjaman/tambah" type="button" class="btn btn-success">Tambah</a>
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
                    <th scope="col">Nip</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Tenggat Peminjaman</th>
                    <th scope="col">Status</th>
                    <th scope="col">Barang</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($peminjaman as $item) : ?>
                    <tr>
                        <th scope="row"><?= $no++; ?></th>
                        <td><?= $item['nip']; ?></td>
                        <td><?= $item['nama_pengguna']; ?></td>
                        <td><?= $item['tanggal_peminjaman']; ?></td>
                        <td><?= $item['tenggat_peminjaman']; ?></td>
                        <td><?= $item['status']; ?></td>
                        <td>
                            <?php foreach ($item['barang'] as $barang) : ?>
                                <?= $barang['nama_barang'] . ' (' . $barang['kode_barang'] . ')<br>'; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <a href="/guru/peminjaman/edit/<?= $item['id_peminjaman']; ?>" type="button" class="btn btn-info justify-content-end text-white">Edit</a>
                            <a href="/guru/peminjaman/hapus/<?= $item['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?= $this->endSection() ?>

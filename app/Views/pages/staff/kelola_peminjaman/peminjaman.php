<?= $this->extend('template/template-staff') ?>
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
         
        </div>
        <?php if (session('success')) : ?>
            <div class="card bg-gradient-primary">  
                <!-- /.card-header -->
                <div class="card-body">
                    <?php echo session('success') ?>
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
                                <?= $barang['nama_barang'] . ' (' . $barang['kondisi_barang'] . ')<br>'; ?>
                            <?php endforeach; ?>
                        </td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#confirmModal" class="btn btn-info justify-content-end text-white" data-id="<?= $item['id_peminjaman']; ?>">Acc</a>
                            <a href="/admin/peminjaman/hapus/<?= $item['id_peminjaman']; ?>" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menyetujui peminjaman ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <a id="confirmBtn" href="#" class="btn btn-primary">Ya, Acc</a>
            </div>
        </div>
    </div>
</div>

<script>
    var confirmModal = document.getElementById('confirmModal');
    confirmModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget; 
        var id = button.getAttribute('data-id'); 
        var actionUrl = '/staff/kelola-peminjaman/acc/' + id;
        var confirmBtn = document.getElementById('confirmBtn');
        confirmBtn.setAttribute('href', actionUrl);
    });
</script>

<?= $this->endSection() ?>

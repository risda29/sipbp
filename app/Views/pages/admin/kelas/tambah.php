<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<form action='/admin/kelas/simpan' method='post'>

    <div class="container-fluid">
        <?php if (session()->getFlashdata('validation')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('validation')->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan">
        </div>
        <div class="mb-3">
            <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
            <input type="text" class="form-control" id="jumlah_siswa" name="jumlah_siswa">
        </div>


        <button type="submit" class="btn btn-primary">Simpan</button>
</form>
</div>

<?= $this->endSection() ?>
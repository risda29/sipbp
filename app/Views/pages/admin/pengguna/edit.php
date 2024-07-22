<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<form action="/admin/pengguna/update/<?php echo $pengguna['id_pengguna'] ?>" method="post">
    <div class="container-fluid">
    <?php if (session()->getFlashdata('validation')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('validation')->listErrors() ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" value="<?php echo $pengguna['nama_pengguna'] ?>" id="nama" name="nama_pengguna" >
        </div>
        <div class="mb-3">
            <label for="nip" class="form-label">NIP</label>
            <input type="text" class="form-control" value="<?php echo $pengguna['nip'] ?>" id="nip" name ="nip">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="text" class="form-control" value="<?php echo $pengguna['email'] ?>" id="email" name= "email">
        </div>
        <div class="mb-3">
            <label for="no_handphone" class="form-label">Nomor Handphone</label>
            <input type="text" class="form-control" id="no_hp" value="<?php echo $pengguna['no_hp'] ?>" name = "no_hp">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" value="<?php echo $pengguna['alamat'] ?>" id="alamat" name = "alamat">
        </div>
        <div class="input-group mb-3">
            <label class="input-group-text" for="level">Level</label>
            <select class="form-select" id="level" name = "level">
                <option value="admin">Admin</option>
                <option value="guru">Guru</option>
                <option value="staff">Staff</option>
                <option value="kepala_sekolah">Kepala Sekolah</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

<?= $this->endSection() ?>
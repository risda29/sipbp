<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<form action="/admin/kelas/update/<?php echo $kelas['id_kelas'] ?>" method="post">
    <div class="container-fluid">
        <div class="mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" class="form-control" value="<?php echo $kelas['nama_kelas'] ?>" id="nama_kelas" name="nama_kelas" >
        </div>
        <div class="mb-3">
            <label for="jurusan" class="form-label">Jurusan</label>
            <input type="text" class="form-control" value="<?php echo $kelas['jurusan'] ?>" id="jurusan" name ="jurusan">
        </div>
        <div class="mb-3">
            <label for="jumlah_siswa" class="form-label">Jumlah Siswa</label>
            <input type="text" class="form-control" value="<?php echo $kelas['jumlah_siswa'] ?>" id="jumlah_siswa" name= "jumlah_siswa">
        </div>
      
       
        <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

<?= $this->endSection() ?>
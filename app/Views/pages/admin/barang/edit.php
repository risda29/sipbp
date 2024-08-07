<?= $this->extend('template/template-admin') ?>
<?= $this->section('content') ?>
<form action="/admin/barang/update/<?php echo $barang['id_barang'] ?>" method="post">
    <div class="container-fluid">
        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama barang</label>
            <input type="text" class="form-control" id="nama_barang" value="<?php echo $barang['nama_barang'] ?>" name="nama_barang" >
        </div>
        
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control" id="stok_barang" value="<?php echo $barang['stok_barang'] ?>"name = "stok_barang">
        </div>
       
        <div class="input-group mb-3">
            <label class="input-group-text" for="kondisi_barang">Kondisi barang</label>
            <select class="form-select" id="kondisi_barang" name="kondisi_barang">
                <option value="layak">Layak</option>
                <option value="tidak layak">Tidak Layak</option>
                <option value="rusak">Rusak</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

<?= $this->endSection() ?>
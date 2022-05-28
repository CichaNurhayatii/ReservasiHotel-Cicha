<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan  Fasilitas Kamar</h2>
<p>Silahkan masukkan data  fasilitas kamar baru pada form dibawah ini</p>
<form method="POST" action="/fkamar/simpan" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <input type="text" name="txtTipeKamar" class="form-control" placeholder="Masukan tipe kamar" autocomplete="off" required>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextareal" class="font-weight-bold">Fasilitas</label>
        <textarea name="txtInputFasilitas" class="form-control rounded-0" id="exampleFormControlTextareal" rows="10"></textarea>
    </div>
    
    
    <div class="form-group">
        <button class="btn btn-primary" type="submit">Simpan</button>
    </div>
</form>
<?= $this->endSection() ?>
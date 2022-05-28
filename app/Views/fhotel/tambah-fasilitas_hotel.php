<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Penambahan Fasilitas Hotel</h2>
<p>Silahkan masukan data Fasilitas Hotel baru pada form dibawah ini</p>
<form method="POST" action="/fhotel/simpan" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Fasilitas Hotel</label>
<input type="text" name="txtFasilitas" class="form-control" placeholder="Masukan fasilitas hotel" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi</label>
<input type="text" name="txtDes" class="form-control" placeholder="Masukan Deskripsi hotel" autocomplete="off" autofocus required>
</div>
<div class="form-group">
<label class="font-weight-bold">Gambar</label>
<input type="file" name="txtInputFoto" class="form-control">
</div>
<div class="form-group">
<button class="btn btn-primary">Simpan</button>
</div>
</form>
<?=$this->endSection();?>
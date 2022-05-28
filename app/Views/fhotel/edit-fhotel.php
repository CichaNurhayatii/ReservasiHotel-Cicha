<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Update Fasilitas Hotel</h2>
<p>Silahkan masukan data Fasilitas baru pada form dibawah ini</p>
<form method="POST" action="/fhotel/update" enctype="multipart/form-data">
<div class="form-group">
<label class="font-weight-bold">Fasilitas Hotel</label>
<input type="hidden" name="txtId"  value="<?=$ListFasilitas['idfasilitas'];?>">
<input type="text" name="txtFasilitas"class="form-control"  value="<?=$ListFasilitas['jenis'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold">Deskripsi</label>
<input type="text" name="txtDes" class="form-control" value="<?=$ListFasilitas['deskripsi'];?>">
</div>
<div class="form-group">
<label class="font-weight-bold"> Foto</label><br/>
<input type="hidden" name="txtFoto"  value="<?=$ListFasilitas['gambar'];?>">
<?php
    if (!empty($ListFasilitas['gambar'])) {
    echo '<img src="'.base_url("/gambar/".$ListFasilitas['gambar']).'" width="150">';
    }
?>
<input type="file" name="txtFotoFasilitas" class="form-control">
</div>
<div class="form-group">
<button class="btn btn-primary"onclick="return confirm('Apakah Anda yakin akan mengupdate data ini?')">Update</button>
</div>
</form>
<?=$this->endSection();?>
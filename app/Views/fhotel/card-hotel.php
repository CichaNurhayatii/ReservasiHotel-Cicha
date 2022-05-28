<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Hotel</h2>
<p>Berikut ini daftar Fasilitas Hotel yang sudah terdaftar dalam database.</p>
<p>
<a href="/fhotel/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
</p>
<?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil');?>
                </div>
            <?php } ?>
<div class="row">
<?php

foreach($ListFasilitas as $row){

?>
<div class="col-md-3">
        <div class="card"">
        <img class="card-img-top" src="<?=base_url("/gambar/".$row['gambar']);?>" width="150" alt="No image">
        <div class="card-body">
            <h4 class="card-title">Jenis</h4>
            <p class="card-text"> <?=$row['jenis'];?>  </p>
            <h4 class="card-title">Deskripsi</h4>
            <p class="card-text"> <?=$row['deskripsi'];?>  </p>
            <a href="/fhotel/edit/<?=$row['idfasilitas'];?>" class="btn btn-primary">Edit</a>
            <form action="/fhotel/hapus/<?=$row['idfasilitas']; ?>" method="get" class="d-inline">
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?');">Hapus</button>
            </form>
            </div>
        </div>
</div>
<?php } ?>
<?= $this->endSection() ?>
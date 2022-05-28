<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data  Fasilitas Kamar</h2>
<p>Berikut ini daftar  Fasilitas Kamar yang sudah terdaftar dalam database.</p>
<p>
<a href="/fkamar/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas</a>
</p>
<?php if(!empty(session()->getFlashdata('berhasil'))){ ?>
                <div class="alert alert-success">
                    <?php echo session()->getFlashdata('berhasil');?>
                </div>
            <?php } ?>
<div class="row">
<?php

foreach($ListKamar as $row){

?> 
<div class="card w-75">
<div class="card text-bg-success p-3">
<div class="card-header"></div>
        
        <div class="card-body">
            <h4 class="card-title">Tipe Kamar</h4>
            <p class="card-text success"> <?=$row['tipe_kamar'];?>  </p>
            <h4 class="card-title">Fasilitas</h4>
            <p class="card-text"> <?=$row['fasilitas'];?>  </p>
            <a href="/fkamar/edit/<?=$row['id_fasilitas'];?>" class="btn btn-primary">Edit</a>
            <form action="/fkamar/hapus/<?=$row['id_fasilitas']; ?>" method="get" class="d-inline">
            <button type="submit" class="btn btn-danger" onclick="return confirm ('Apakah Anda yakin?');">Hapus</button>
</form>
            
        </div>
        </div>
</div>
<?php } ?>

</div>
<?= $this->endSection() ?>
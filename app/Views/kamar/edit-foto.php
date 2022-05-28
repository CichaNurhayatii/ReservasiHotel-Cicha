<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Update Foto</h2>
<p>Silahkan upload foto baru</p>
<form method="POST" action="/kamar/updateFoto" enctype="multipart/form-data">
    <div class="form-group">
        <label class="font-weight-bold">Nomor Kamar</label>
        <input type="hidden" name="foto" class="form-control" value="<? $detailKamar[0]['foto']; ?>">
        <input type="text" name="txtNomorKamar" class="from-control" placeholder="Masukkan Nomor Kamar" value="<?=$detailKamar[0]['nomor_kamar'];?>">
    </div>
    <div class="form-group">
        <label class="font-weight-bold mb-1">Foto</label><br />
        <?php
        if (!empty($detailKamar[0]['foto'])) {
            echo '<img src="' . base_url("/gambar/" . $detailKamar[0]['foto']) . '" width="150">';
        }
        ?>
        <input type="file" name="txtInputFoto" class="form-control">
    </div>
    <div class="form-group">
        <button class="btn btn-primary mx-1">Update foto</button>
    </div>
</form>
<?= $this->endSection() ?>
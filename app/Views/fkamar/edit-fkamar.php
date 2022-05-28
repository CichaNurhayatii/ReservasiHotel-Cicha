<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Update Data Fasilitas Kamar</h2>
<p>Silahkan gunakan form dibawah ini untuk merubah data fasilitas kamar.</p>
<form method="POST" action="/fkamar/update">
    <div class="form-group">
        <label class="font-weight-bold">Tipe Kamar</label>
        <input type="text" name="txtTipeKamar" class="form-control" placeholder="Masukan Tipe Kamar" value="<?=$detailFasilitas['tipe_kamar'];?>">
        <input type="hidden" name="txtIdKamar"class="form-control"  value="<?=$detailFasilitas['id_fasilitas'];?>" readonly>
    </div>
    <div class="form-group">
        <label class="font-weight-bold">Nama Fasilitas</label>
        <input type="text" name="txtInputFasilitas" class="form-control" placeholder="Masukan nama fasilitas" value="<?=$detailFasilitas['fasilitas'];?>"
        autocomplete="off" autofocous reaquire>
        
    </div>
    <div class="form-group">
<button class="btn btn-primary" onclick="return confirm('Apakah Anda yakin?')">Update Fasilitas</button>
</div>
</form>
<?= $this->endSection() ?>

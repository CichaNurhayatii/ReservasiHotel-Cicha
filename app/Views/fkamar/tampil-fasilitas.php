<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas </h2>
<p>Berikut ini daftar Fasilitas Kamar Hotel Loonaria yang
    sudah terdaftar dalam database.</p>
<p>
    <a href="/fkamar/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas</a>
    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
</p>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>Tipe kamar</th>
            <th>Fasilitas</th>
          
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        $nomor = null;
        foreach ($ListKamar as $row) {
            $nomor++;
            $htmlData = '<tr>';

            $htmlData .= '<td>' . $row['tipe_kamar'] . '</td>';
            $htmlData .= '<td>' . $row['fasilitas'] . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/fkamar/edit/' . $row['id_fasilitas'] . '" class="btn btn-info btn-sm mr-1">Edit</a>';
            $htmlData .= '<a href="/fkamar/hapus/' . $row['id_fasilitas'] . '" class="btn btn-danger on">Hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>
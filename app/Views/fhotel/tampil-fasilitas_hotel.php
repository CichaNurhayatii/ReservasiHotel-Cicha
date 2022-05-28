<?= $this->extend('Dashboard') ?>
<?= $this->section('content') ?>
<h2>Data Fasilitas Hotel </h2>
<p>Berikut ini daftar Fasilitas Hotel Loonaria yang
    sudah terdaftar dalam database.</p>
<p>
    <a href="/fhotel/tambah" class="btn btn-primary btn-sm">Tambah Fasilitas Hotel</a>
</p>
<?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-success" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
</div>
<?php endif; ?>
<table class="table table-sm table-hovered">
    <thead class="bg-light text-center">
        <tr>
            <th>Fasilitas</th>
            <th>Foto</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $htmlData = null;
        $nomor = null;
        foreach ($ListFasilitas as $row) {
            $nomor++;
            $htmlData = '<tr>';

            $htmlData .= '<td>' . $row['jenis'] . '</td>';
            $htmlData .= '<td>' . '<img src="' . base_url("/gambar/" . $row['gambar']) . '"width="150">' . '</td>';
            $htmlData .= '<td>' . $row['deskripsi'] . '</td>';
            $htmlData .= '<td class="text-center">';
            $htmlData .= '<a href="/fhotel/edit/' . $row['idfasilitas'] . '" class="btn btn-info btn-sm mr-1">Edit</a>';
            $htmlData .= '<a href="/fhotel/hapus/' . $row['idfasilitas'] . '" class="btn btn-danger btn-sm">Hapus</a>';
            $htmlData .= '</td>';
            $htmlData .= '</tr>';
            echo $htmlData;
        }
        ?>
    </tbody>
</table>
<?= $this->endSection() ?>
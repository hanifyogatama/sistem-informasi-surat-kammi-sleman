<?php

// header("Content-type:application/octet-stream/");
// header("Content-Disposition:attachment; filename=$title.xlsx");
// header("Pragma: no-cache");
// header("Expires: 0");


$file = "myfile.xlsx";
header('Content-Disposition: attachment; filename=' . $file);
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length: ' . filesize($file));
header('Content-Transfer-Encoding: binary');
header('Cache-Control: must-revalidate');
header('Pragma: public');
readfile('myfile.xlsx');

?>


<h3>Laporan surat masuk tanggal : <?= date('d F Y') ?></h3>
<table border="1" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Pengirim</th>
            <th>Sifat Surat</th>
            <th>Deskripsi</th>
            <th>Tanggal Surat</th>
            <th>Tanggal Diterima</th>
            <th>Disposisi</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach ($surat_masuk->result() as $key => $data) : ?>
            <tr>
                <th><?= $i; ?></th>
                <td><?= $data->no_surat ?></td>
                <td><?= $data->nama_instansi ?></td>
                <td><?= $data->status ?></td>
                <td><?= $data->isi ?></td>
                <td><?= $data->tanggal_surat ?></td>
                <td><?= $data->tanggal_diterima ?></td>
                <td><?= $data->keterangan ?></td>
            </tr>
            <?php $i++; ?>
        <?php endforeach; ?>
    </tbody>
</table>
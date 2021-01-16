<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disposisi</title>

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>

<body>
    Tanggal cetak : <?= date('d F Y') ?>
    <table style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tujuan Disposisi</th>
                <th>Jenis Surat</th>
                <th>Deskripsi</th>
                <th>Batas Waktu</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($disposisi as $data) : ?>
                <tr>
                    <th><?= $i; ?></th>
                    <td><?= $data->nomor_surat ?></td>
                    <td><?= $data->nama_departemen ?></td>
                    <td><?= $data->status ?></td>
                    <td><?= $data->isi ?></td>
                    <?php
                    $oldate = $data->batas_waktu;
                    $newDate = date("d-m-Y", strtotime($oldate)); ?>
                    <td><?= $newDate ?></td>
                    <td><?= $data->keterangan ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
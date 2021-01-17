<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keluar</title>

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
    <br><br>
    <table style="width:100%">
        <thead>
            <tr style="background-color: cornflowerblue;">
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Penerima</th>
                <th>Jenis Surat</th>
                <th>Deskripsi</th>
                <th>Tanggal Surat</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($surat_keluar as $data) : ?>
                <tr>
                    <td style="text-align: center;"><?= $i; ?></td>
                    <td><?= $data->no_surat ?></td>
                    <td><?= $data->nama_instansi ?></td>
                    <td><?= $data->status ?></td>
                    <td><?= $data->isi ?></td>
                    <?php
                    $oldate = $data->tanggal_surat;
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
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
    <br>
    <br>
    <table style="width:100%">
        <thead>
            <tr style="background-color: cornflowerblue;">
                <th>No</th>
                <th>Nomor Surat</th>
                <th>Tanggal Surat</th>
                <th>Pengirim</th>
                <th>Tujuan Disposisi</th>
                <th>Jenis Surat</th>
                <th>Deskripsi</th>
                <th>Tanggal Disposisi</th>
                <th>Batas Waktu</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($disposisi as $data) : ?>
                <tr>
                    <?php
                    $oldBatasWaktu = $data->batas_waktu;
                    $oldTanggalSurat = $data->tanggal_surat;
                    $oldTanggalDibuat = $data->tanggal_dibuat;

                    $newTanggalDibuat = date("d-m-Y", strtotime($oldTanggalDibuat));
                    $newBatasWaktu = date("d-m-Y", strtotime($oldBatasWaktu));
                    $newTanggalSurat = date("d-m-Y", strtotime($oldTanggalSurat)); ?>

                    <td style="text-align: center;"><?= $i; ?></td>
                    <td><?= $data->nomor_surat ?></td>
                    <td><?= $newTanggalSurat ?></td>
                    <td><?= $data->nama_instansi ?></td>
                    <td><?= $data->nama_departemen ?></td>
                    <td><?= $data->status ?></td>
                    <td><?= $data->isi ?></td>
                    <td><?= $newTanggalDibuat ?></td>
                    <td><?= $newBatasWaktu ?></td>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Masuk</title>


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
                <th>Pengirim</th>
                <th>Sifat Surat</th>
                <th>Deskripsi</th>
                <th>Tanggal Surat</th>
                <th>Tanggal Diterima</th>
                <th>Ket</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($surat_masuk as $data) : ?>
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
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
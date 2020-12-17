<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            width: 700px;
            margin: auto;
        }

        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
            text-align: left;

        }

        .table {

            text-align: center;
        }
    </style>
</head>

<body>
    <table style="width:100%">
        <?php foreach ($disposisi->result() as $key => $data) : ?>
            <tr>
                <td colspan="2" class="table">
                    <h3>KAMMI KAMDA SLEMAN <br /> LEMBAR DISPOSISI</h3>
                </td>
            </tr>
            <tr>
                <?php
                $oldBatasWaktu = $data->batas_waktu;
                $oldTanggalDiterima = $data->tanggal_diterima;
                $newBatasWaktu = date("d-m-Y", strtotime($oldBatasWaktu));
                $newTanggalDiterima = date("d-m-Y", strtotime($oldTanggalDiterima));
                ?>

                <th>Tanggal Diterima : <?= $newTanggalDiterima ?></th>
                <th>Batas Waktu : <?= $newBatasWaktu ?></th>
            </tr>
            <tr>

                <td colspan="2">
                    <br>
                    No Surat : <?= $data->nomor_surat ?><br><br>
                    Tanggal Surat : <?= $data->tanggal_surat ?><br><br>
                    Asal Surat : <?= $data->nama_instansi ?><br><br>
                    Sifat Surat : <?= $data->status ?><br><br>
                    Keterangan: <?= $data->keterangan ?><br><br>
                </td>
            </tr>
            <tr>
                <th style="text-align: center;">Deskripsi</th>
                <th style="text-align: center;">Diteruskan Kepada</th>
            </tr>
            <tr>
                <td style="height: 100px, padding:auto;"><?= $data->isi ?></td>
                <td><?= $data->nama_departemen ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>
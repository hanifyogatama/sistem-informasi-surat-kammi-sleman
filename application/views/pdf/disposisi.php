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
            width: 200px;
            text-align: center;
        }
    </style>
</head>

<body>
    <table style="width:100%">
        <?php foreach ($disposisi->result() as $key => $data) : ?>
            <tr>
                <td colspan="2" class="table">
                    <br><br>
                    <h3>KAMMI PD SLEMAN <br /> LEMBAR DISPOSISI</h3>
                    <br><br>
                </td>
            </tr>
            <tr style="margin-top: 10px;">

                <?php
                $oldBatasWaktu = $data->batas_waktu;
                $oldTanggalSurat = $data->tanggal_surat;
                $oldTanggalDibuat = $data->tanggal_dibuat;

                $newTanggalDibuat = date("d-m-Y", strtotime($oldTanggalDibuat));
                $newBatasWaktu = date("d-m-Y", strtotime($oldBatasWaktu));
                $newTanggalSurat = date("d-m-Y", strtotime($oldTanggalSurat));
                ?>

                <th>Tanggal Disposisi : <?= $newTanggalDibuat ?></th>
                <th>Batas Waktu : <?= $newBatasWaktu ?></th>
            </tr>
            <tr>
                <td colspan="2">
                    <br>
                    No Surat : <?= $data->nomor_surat ?><br><br>
                    Tanggal Surat : <?= $newTanggalSurat ?><br><br>
                    Asal Surat : <?= $data->nama_instansi ?><br><br>
                    Jenis Surat : <?= $data->status ?><br><br>
                    Keterangan: <?= $data->keterangan ?><br><br>
                    <br>
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
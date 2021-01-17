<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <?php foreach ($disposisi->result() as $key => $data) : ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
            </div>
            <div class="card-body">
                <div class="col-lg">

                    <?= $this->session->flashdata('message'); ?>

                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <a href="<?= base_url('suratmasuk/disposisi_edit/') . $data->id_disposisi  ?>" title="Edit" class="btn btn-outline-success btn-sm mb-3 px-3"><i class="fas fa-edit"></i></a>

                    <a href="<?= base_url('suratmasuk/printDisposisi/') . $data->id_disposisi  ?>" title="Print" class="btn btn-outline-warning btn-sm mb-3 px-3" target="_blank"><i class="fas fa-print"></i></a>

                    <a href="<?= base_url('suratmasuk/pdfDisposisi/') . $data->id_disposisi  ?>" title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3"><i class="fa fa-file-pdf"></i></a>

                    <div class="row">

                        <div class="col-md">
                            <table class="table table-hover">
                                <br>
                                <tr>
                                    <td><strong>Nomor Surat</strong></td>
                                    <td><?= $data->nomor_surat; ?></td>
                                </tr>
                                <?php
                                $oldBatasWaktu = $data->batas_waktu;
                                $oldTanggalDiterima = $data->tanggal_diterima;
                                $oldTanggalSurat = $data->tanggal_surat;
                                $oldTanggalDibuat = $data->tanggal_dibuat;

                                $newBatasWaktu = date("d-m-Y", strtotime($oldBatasWaktu));
                                $newTanggalDiterima = date("d-m-Y", strtotime($oldTanggalDiterima));
                                $newTanggalSurat = date("d-m-Y", strtotime($oldTanggalSurat));
                                $newTanggalDibuat = date("d-m-Y", strtotime($oldTanggalDibuat));
                                ?>
                                <tr>
                                    <td><strong>Tanggal Surat</strong></td>
                                    <td><?= $newTanggalSurat; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Diterima</strong></td>
                                    <td><?= $newTanggalDiterima ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tujuan Disposisi</strong></td>
                                    <td><?= $data->nama_departemen; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Surat</strong></td>
                                    <td><?= $data->status; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Pengirim</strong></td>
                                    <td><?= $data->nama_instansi; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Disposisi</strong></td>
                                    <td><?= $newTanggalDibuat ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Batas Waktu</strong></td>
                                    <td><?= $newBatasWaktu ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Deskripsi</strong></td>
                                    <td><?= $data->isi; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Keterangan</strong></td>

                                    <?php $x = $data->keterangan;
                                    if ($x == '') : ?>
                                        <td>
                                            <em class="text-danger"><?= 'belum ada keterangan' ?></em>
                                        </td>
                                    <?php else : ?>
                                        <td>
                                            <?= $data->keterangan; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
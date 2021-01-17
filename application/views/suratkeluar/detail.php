<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <?php foreach ($surat_keluar->result() as $key => $data) : ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
            </div>
            <div class="card-body">
                <div class="col-lg">
                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <a href="<?= base_url('suratkeluar/edit/') . $data->id_surat_keluar  ?>" title="Edit" class="btn btn-outline-success btn-sm mb-3 px-3"><i class="fas fa-edit"></i></a>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body mt-5 px-auto">
                                <h6>File</h6>
                                <img src="<?= base_url('assets/img/profile/PDF_file_icon.png') ?>" class="img-profile" width="130px" height="150px">
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <?php $fileSurat = $data->file_surat;
                                    if ($fileSurat == '') : ?>
                                        <a href="#" title="file tidak tersedia" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" style="cursor: no-drop;"><i class="fas fa-search fa-sm text-white-50"></i> Preview</a>
                                    <?php else : ?>
                                        <a href="<?= base_url('suratkeluar/pdf/') . $data->file_surat  ?>" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-search fa-sm text-white-50"></i> Preview</a>
                                    <?php endif; ?>

                                    <?php $fileSurat = $data->file_surat;
                                    if ($fileSurat == '') : ?>
                                        <a href="#" title="file tidak tersedia" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" style="cursor: no-drop;"><i class="fas fa-download fa-sm text-white-50"></i> Download</a>
                                    <?php else : ?>
                                        <a href="<?= base_url('suratkeluar/download/') . $data->file_surat  ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Download</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover">
                                <br>
                                <tr>
                                    <td><strong>Nomor Surat</strong></td>
                                    <td><?= $data->no_surat; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Penerima</strong></td>
                                    <td><?= $data->nama_instansi; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Jenis Surat</strong></td>
                                    <td><?= $data->status; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Tanggal Surat</strong></td>
                                    <?php
                                    $oldate = $data->tanggal_surat;
                                    $newDate = date("d-m-Y", strtotime($oldate)); ?>
                                    <td><?= $newDate  ?></td>
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
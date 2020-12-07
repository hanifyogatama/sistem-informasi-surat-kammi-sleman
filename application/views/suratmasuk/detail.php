<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <?php foreach ($surat_masuk->result() as $key => $data) : ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
            </div>
            <div class="card-body">
                <div class="col-lg">
                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <a href="<?= base_url('suratmasuk/edit/') . $data->id_surat_masuk  ?>" title="Edit" class="btn btn-outline-success btn-sm mb-3 px-3"><i class="fas fa-edit"></i></a>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <img src="" class="img-profile rounded-circle shadow" width="200px" height="200px">
                            </div>
                        </div>  
                        <div class="col-md-8">
                            <table class="table">
                                <br>
                                <tr>
                                    <td>Nomor Surat</td>
                                    <td><strong><?= $data->no_surat; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Pengirim</td>
                                    <td><strong><?= $data->nama_instansi; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Sifat Surat</td>
                                    <td><strong><?= $data->status; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Surat</td>
                                    <td><strong><?= $data->tanggal_surat; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Diterima</td>
                                    <td><strong><?= $data->tanggal_diterima; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Deskripsi</td>
                                    <td><strong><?= $data->isi; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td><strong><?= $data->keterangan; ?></strong></td>
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
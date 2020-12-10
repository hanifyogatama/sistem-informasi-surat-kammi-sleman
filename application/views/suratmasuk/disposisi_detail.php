<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <?php foreach ($disposisi->result() as $key => $data) : ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
            </div>
            <div class="card-body">
                <div class="col-lg">

                    <?= $this->session->flashdata('message'); ?>

                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-dark btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <a href="<?= base_url('suratmasuk/disposisi_edit/') . $data->id_disposisi  ?>" title="Edit" class="btn btn-outline-success btn-sm mb-3 px-3"><i class="fas fa-edit"></i></a>

                    <?php echo anchor('#', '<button title="Print"  class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-print "></i> </button>'); ?>

                    <div class="row">

                        <div class="col-md">
                            <table class="table table-hover">
                                <br>
                                <tr>
                                    <td>Nomor Surat</td>
                                    <td><strong><?= $data->nomor_surat; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Tujuan Disposisi</td>
                                    <td><strong><?= $data->nama_departemen; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Sifat Surat</td>
                                    <td><strong><?= $data->status; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Batas Waktu</td>
                                    <td><strong><?= $data->batas_waktu; ?></strong></td>
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
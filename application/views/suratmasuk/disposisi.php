<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">
                        <?= form_error('departemen', '<div class="alert alert-dark" role = "alert">', '</div>') ?>

                        <?= $this->session->flashdata('message'); ?>

                        <?php echo anchor('suratmasuk', '<button title="Back" class="btn btn-outline-dark btn-sm mb-3 px-3"><i class="fas fa-arrow-left "></i> </button>'); ?>

                        <?php echo anchor('suratmasuk/disposisi_add/' . $surat_masuk['id_surat_masuk'], '<button title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Tujuan Disposisi</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Batas Waktu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($disposisi->result() as $key => $data) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                        <td><?= $data->nomor_surat ?></td>
                                        <td><?= $data->nama_departemen ?></td>
                                        <td><?= $data->status ?></td>
                                        <td><?= $data->batas_waktu ?></td>
                                        <td align="center">

                                            <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>
                                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-sm">
                                                        <a href="<?= base_url('suratmasuk/disposisi_detail/') . $data->id_disposisi ?>" class="btn btn-warning btn-circle btn-sm mx-2" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>

                                                        <a href="" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-circle btn-sm mx-2" title="delete"><i class="fas fa-trash" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!--  delete data disposisi -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDeleteModalLabel">Delete data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('suratmasuk/disposisi_delete/') . $data->id_disposisi ?>" method="POST">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <i class="fas fa-exclamation-circle fa-4x"></i>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_disposisi" value="">
                        </div>
                        <div class="form-group">
                            <p>Are you sure you want to delete data?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url() ?>suratmasuk/disposisi_delete/<?= $data->id_disposisi ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
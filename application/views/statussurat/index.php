<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <?= form_error('status_surat', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-outline-primary btn-sm mb-3 px-3" title="Add" data-toggle="modal" data-target="#newStatusSuratModal"><i class="fas fa-plus"> </i></a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($status_surat as $status_surat) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $status_surat['status']; ?></td>
                                        <td>
                                            <a href="<?= base_url('statussurat/edit/') . $status_surat['id_status_surat']; ?>" class="badge badge-success">edit</a>

                                            <a href="" data-toggle="modal" data-target="#modal-delete" class="badge badge-danger">delete</a>
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

<!-- form model input add instansi  -->
<div class="modal fade" id="newStatusSuratModal" tabindex="-1" role="dialog" aria-labelledby="newDepartemenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDepartemenModalLabel">Add Sifat Surat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('statussurat/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="status" name="status" placeholder="status surat">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--  delete status surat -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDeleteModalLabel">Delete data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('statussurat/delete/') . $status_surat['id_status_surat'] ?>" method="POST">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <i class="fas fa-exclamation-circle fa-4x"></i>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_status_surat" value="">
                        </div>
                        <div class="form-group">
                            <p>Are you sure you want to delete data?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url() ?>statussurat/delete/<?= $status_surat['id_status_surat']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</div>
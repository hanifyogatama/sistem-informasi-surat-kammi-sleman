<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">
                        <?= form_error('departemen', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <?= $this->session->flashdata('message'); ?>

                        <?php echo anchor('suratmasuk/disposisi_add/' . $surat_masuk['id_surat_masuk'], '<button title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Tujuan</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Batas Waktu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php $i = 1; ?>
                                <?php foreach ($departemen as $dep) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $dep['nama_departemen']; ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#modal-edit<?= $dep['id_departemen']; ?>" class="badge badge-success">edit</a>

                                            <a href="" data-toggle="modal" data-target="#modal-delete<?= $dep['id_departemen']; ?>" class="badge badge-danger">delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?> -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<!-- form model input add departemen  -->
<div class="modal fade" id="newDepartemenModal" tabindex="-1" role="dialog" aria-labelledby="newDepartemenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDepartemenModalLabel">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('departemen/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" placeholder="disposisi">
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
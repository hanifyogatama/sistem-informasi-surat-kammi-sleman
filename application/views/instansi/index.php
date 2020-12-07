<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">
                        <?= form_error('instansi', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-outline-primary btn-sm mb-3 px-3" title="Add" data-toggle="modal" data-target="#newInstansiModal"><i class="fas fa-plus"> </i></a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($instansi as $instansi) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $instansi['nama_instansi']; ?></td>
                                        <td><?= $instansi['alamat']; ?></td>
                                        <td>
                                            <a href="<?= base_url('instansi/edit/') . $instansi['id_instansi']; ?>" class="badge badge-success">edit</a>

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
<div class="modal fade" id="newInstansiModal" tabindex="-1" role="dialog" aria-labelledby="newDepartemenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDepartemenModalLabel">Add New Instansi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('instansi/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="instansi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
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

<!-- departemen delete departemen -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDeleteModalLabel">Delete data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('instansi/delete/') . $instansi['id_instansi'] ?>" method="POST">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <i class="fas fa-exclamation-circle fa-4x"></i>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_instansi" value="">
                        </div>
                        <div class="form-group">
                            <p>Are you sure you want to delete data?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url() ?>instansi/delete/<?= $instansi['id_instansi']; ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
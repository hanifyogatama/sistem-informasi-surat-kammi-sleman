<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    <?= form_error('departemen', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#newDepartemenModal"><i class="fas fa-plus"> </i> Add</a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Departemen</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
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
                            <?php endforeach; ?>
                        </tbody>
                    </table>
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
                <h5 class="modal-title" id="newDepartemenModalLabel">Add New Divisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('departemen/add'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" placeholder="departemen name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- departemen edit departemen -->
<?php $no = 0;
foreach ($departemen as $dep) :  $no++; ?>
    <div class="modal fade" id="modal-edit<?= $dep['id_departemen']; ?>" tabindex="-1" role="dialog" aria-labelledby="newEditModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newEditModalLabel">Edit Departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('departemen/edit'); ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_departemen" value="<?= $dep['id_departemen']; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nama_departemen" name="nama_departemen" placeholder="departemen" value="<?= $dep['nama_departemen']; ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i>edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>


<!-- departemen delete departemen -->
<?php $no = 0;
foreach ($departemen as $dep) :  $no++; ?>
    <div class="modal fade" id="modal-delete<?= $dep['id_departemen']; ?>" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDeleteModalLabel">Delete departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('dtepartemen/delete/') . $dep['id_departemen'] ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_departemen" value="<?= $dep['id_departemen']; ?>">
                        </div>
                        <div class="form-group">
                            <p>yakin ingin menghapus data ?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url() ?>departemen/delete/<?= $dep['id_departemen']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>
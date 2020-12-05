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

                        <a href="" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#newDepartemenModal"><i class="fas fa-plus"> </i> Add</a>

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
                                            <a href="<?= base_url('instansi/edit/') . $instansi['id_instansi']; ?>" class="badge badge-warning">edit</a>

                                            <a href="" data-toggle="modal" data-target="#modal-delete<?= $instansi['id_instansi']; ?>" class="badge badge-danger">delete</a>
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
<div class="modal fade" id="newDepartemenModal" tabindex="-1" role="dialog" aria-labelledby="newDepartemenModalLabel" aria-hidden="true">
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
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" placeholder="nama instansi">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat">
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





<!-- departemen delete departemen -->
<!-- <?php $no = 0;
        foreach ($instansi as $instansi) :  $no++; ?>
    <div class="modal fade" id="modal-delete<?= $instansi['id_instansi']; ?>" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDeleteModalLabel">Delete departemen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('departemen/delete/') . $instansi['id_instansi'] ?>" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_instansi" value="<?= $dep['id_instansi']; ?>">
                        </div>
                        <div class="form-group">
                            <p>yakin ingin menghapus data ?</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
                        <a href="<?= base_url() ?>instansi/delete/<?= $instansi['id_instansi']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?> -->
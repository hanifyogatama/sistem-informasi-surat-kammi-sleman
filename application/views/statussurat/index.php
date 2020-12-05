<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <?= form_error('departemen', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#newDepartemenModal"><i class="fas fa-plus"> </i> Add</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- <?php $i = 1; ?>
                                <?php foreach ($instansi as $instansi) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $instansi['nama_instansi']; ?></td>
                                        <td><?= $instansi['alamat']; ?></td>
                                        <td>
                                            <a href="" data-toggle="modal" data-target="#modal-edit<?= $instansi['id_instansi']; ?>" class="badge badge-success">edit</a>

                                            <a href="" data-toggle="modal" data-target="#modal-delete<?= $instansi['id_instansi']; ?>" class="badge badge-danger">delete</a>
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
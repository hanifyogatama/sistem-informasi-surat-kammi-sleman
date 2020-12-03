<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-6">
                <?= form_error('menu', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-plus"></i> Add</a>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Password</th>
                            <th scope="col">Active</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <?php $i = 1; ?>
                        <?php foreach ($role as $role) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><?= $role['role']; ?></td>
                                <td>
                                    <a href="<?= base_url('admin/roleaccess/') . $role['id_role']; ?>" class="badge badge-warning">access</a>
                                    <a href="" class="badge badge-success">edit</a>
                                    <a href="" class="badge badge-danger">delete</a>
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
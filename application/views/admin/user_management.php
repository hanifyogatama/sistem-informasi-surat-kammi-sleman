<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <?= form_error('menu', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-outline-primary btn-sm mb-3" data-toggle="modal" data-target="#newUserModal"><i class="fas fa-plus"></i> Add</a>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Email</th>
                            <th scope="col">Active</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($users as $users) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><img src="<?= base_url('assets/img/profile/') . $users['gambar'] ?>" class="img-profile rounded-circle" alt="profile image" width="30px" height="30px"></td>

                                <td><?= $users['nama']; ?></td>
                                <td><?= $users['email']; ?></td>
                                <td style="text-align: center;"><?= $users['is_active']; ?></td>
                                <td align="center">
                                    <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>

                                    <div class="dropdown-menu shadow " aria-labelledby="dropdownMenuButton">
                                        <div class="row mx-0 ">
                                            <div class="col-sm ">
                                                <a href="<?= base_url('admin/user_management_detail') ?>" class="btn btn-info btn-circle btn-sm" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>
                                            </div>

                                            <div class="col-sm">
                                                <a href="<?= base_url('admin/user_management_edit') ?>" class="btn btn-primary btn-circle btn-sm" title="edit"><i class="fas fa-edit"></i></a>
                                            </div>

                                            <div class="col-sm">
                                                <a href="" class="btn btn-danger btn-circle btn-sm" title="delete" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash"></i></a>
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


<!-- add user -->
<div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="newUserModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newUserModalLabel">Add New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama" placeholder="full name" name="nama" value="<?= set_value('nama') ?>">
                        <?= form_error('nama', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="email" placeholder="Email Address" name="email" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <select name="id_menu" id="id_menu" class="form-control">
                            <option value="">Select Role</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select>
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


<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title font-weight-bold text-primary" id="newDeleteModalLabel">Delete</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id" value="">
                        </div>
                        <div class="form-group">
                            <p>Yakin ingin menghapus data ?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tidak</button>
                    <a href="" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
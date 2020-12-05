<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <?= form_error('menu', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                <?= $this->session->flashdata('message'); ?>

                <?php echo anchor('admin/user_management_add', '<button title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

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
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <th scope="row"><?= $i; ?></th>
                                <td><img src="<?= base_url('assets/img/profile/') . $user['gambar'] ?>" class="img-profile rounded-circle" alt="profile image" width="30px" height="30px"></td>

                                <td><?= $user['nama']; ?></td>
                                <td><?= $user['email']; ?></td>
                                <td style="text-align: center;"><?= $user['is_active']; ?></td>
                                <td align="center">
                                    <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>

                                    <div class="dropdown-menu shadow " aria-labelledby="dropdownMenuButton">
                                        <div class="row mx-0 ">
                                            <div class="col-sm ">
                                                <a href="<?= base_url('admin/user_management_detail/') . $user['id_user'] ?>" class="btn btn-info btn-circle btn-sm" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>
                                            </div>

                                            <div class="col-sm">
                                                <a href="<?= base_url('admin/user_management_edit/') . $user['id_user'] ?>" class="btn btn-primary btn-circle btn-sm" title="edit"><i class="fas fa-edit"></i></a>
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


<!-- delete user -->

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
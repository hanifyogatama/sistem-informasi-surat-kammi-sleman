<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                <?= $this->session->flashdata('message2'); ?>

                <?= form_error('menu', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                <?php echo anchor('admin/user_management_add', '<button title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

                <!-- searching -->
                <!-- end oof searching -->

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
                                <td><img src="<?= base_url('assets/img/profile/') . $user->gambar ?>" class="img-profile rounded-circle" alt="profile image" width="30px" height="30px"></td>

                                <td><?= $user->nama; ?></td>
                                <td><?= $user->email; ?></td>
                                <td style="text-align: center;"><?= $user->status_user; ?></td>
                                <td align="center">
                                    <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>

                                    <div class="dropdown-menu shadow " aria-labelledby="dropdownMenuButton">
                                        <div class="row mx-0 ">
                                            <div class="col-sm ">
                                                <a href="<?= base_url('admin/user_management_detail/') . $user->id_user ?>" class="btn btn-info btn-circle btn-sm" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>
                                            </div>

                                            <div class="col-sm">
                                                <a href="<?= base_url('admin/user_management_edit/') . $user->id_user ?>" class="btn btn-primary btn-circle btn-sm" title="edit"><i class="fas fa-edit"></i></a>
                                            </div>

                                            <div class="col-sm">
                                                <a href="<?= base_url('admin/delete/') . $user->id_user ?>" class="btn btn-danger btn-circle btn-sm data-delete-2" title="delete"><i class="fas fa-trash"></i></a>
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
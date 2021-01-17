<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <?php foreach ($users as $user) : ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?><strong>
                        <!-- <div class="badge badge-warning py-1"><?= $user->nama; ?></div> -->
                    </strong></h6>
            </div>
            <div class="card-body">
                <div class="col-lg">
                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <a href="<?= base_url('admin/user_management_edit/') . $user->id_user ?>" title="Edit" class="btn btn-outline-success btn-sm mb-3 px-3"><i class="fas fa-edit"></i></a>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <img src="<?= base_url() . '/assets/img/profile/' . $user->gambar ?>" class="img-profile rounded-circle shadow" width="200px" height="200px">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-hover">
                                <br>
                                <tr>
                                    <td><strong>Nama Lengkap</strong></td>
                                    <td><?= $user->nama; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Email</strong></td>
                                    <td><?= $user->email; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Role</strong></td>
                                    <td><?= $user->nama_role; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Status</strong></td>
                                    <td>

                                        <?php $x = $user->is_active;
                                        if ($x == 0) : ?>
                                            <div class="badge badge-danger"><?= $user->status_user; ?></div>
                                        <?php elseif ($x == 1) : ?>
                                            <div class="badge badge-success"><?= $user->status_user; ?></div>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Date Created</strong></td>
                                    <td><?= date('d F Y', $user->tanggal_dibuat); ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</div>
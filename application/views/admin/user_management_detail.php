<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <?php foreach ($users as $user) : ?>
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?><strong>
                        <div class="badge badge-warning py-1"><?= $user->nama; ?></div>
                    </strong></h6>
            </div>
            <div class="card-body">
                <div class="col-lg">
                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <a href="<?= base_url('admin/user_management_edit') ?>" title="Edit" class="btn btn-outline-success btn-sm mb-3 px-3"><i class="fas fa-edit"></i></a>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <img src="<?= base_url() . '/assets/img/profile/' . $user->gambar ?>" class="card-img-top" height="180px" width="90px">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <table class="table">
                                <br>
                                <tr>
                                    <td>Full Name</td>
                                    <td><strong><?= $user->nama; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><strong><?= $user->email; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td><strong><?= $user->id_role; ?></strong></td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>
                                        <strong>
                                            <div class="badge badge-success "><?= $user->is_active; ?></div>
                                        </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Date Created</td>
                                    <td><strong><?= date('d F Y', $user->tanggal_dibuat); ?></strong></td>
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
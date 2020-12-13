<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary px-3 btn-sm  mb-3"><i class="fas fa-arrow-left"></i></a>
                <div class="row">
                    <div class="col-lg-8">
                        <form action="" method="POST" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $users['nama']; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" name="email" value="<?= $users['email']; ?> " readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <input type="hidden" class="form-control" id="id_role" name="id_role" value="">
                                <label for="role" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-6 ">
                                            <input type="password" class="form-control form-control-user" id="password1" placeholder="password" name="password1">
                                            <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="repeat password">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="id_role" class="col-sm-2 col-form-label">Role</label>
                                <div class="col-sm-10 ">
                                    <select name="id_role" id="id_role" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($userrole as $userrole) : ?>
                                            <option value="<?= $userrole['id_role'] ?>" <?= $userrole['id_role'] == $users['id_role'] ? "selected" : null ?>><?= $userrole['role'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="is_active" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 ">
                                    <select name="is_active" id="is_active" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($status_user as $status_user) : ?>
                                            <option value="<?= $status_user['id_status_active'] ?>" <?= $status_user['id_status_active'] == $users['is_active'] ? "selected" : null ?>><?= $status_user['status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-2">
                                    Foto
                                </div>
                                <div class="col-sm-10">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="<?= base_url('assets/img/profile/') . $users['gambar']; ?>" class="img-thumbnail">
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                                <label class="custom-file-label" for="gambar">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right">
                                <button type="submit" name="user_management_edit" class="btn btn-info btn-sm">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
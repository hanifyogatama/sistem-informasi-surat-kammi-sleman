<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-9">
                <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="Back"><i class="fas fa-arrow-left"></i></a>

                <form autocomplete="off" action="<?= base_url('admin/user_management_add'); ?>" method="post">
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input autocomplete="new-password" type="text" class="form-control" id="nama" name="nama" placeholder="full name" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= set_value('email') ?>" autocomplete="new-password">
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10 ">
                            <select name="id_role" id="id_role" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php foreach ($userrole as $userrole) : ?>
                                    <option value="<?= $userrole['id_role'] ?>" <?php echo set_select('id_role', $userrole['id_role'], (!empty($data) && $data == $userrole['id_role'] ? TRUE : FALSE)); ?>><?= $userrole['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_role', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="password" name="password1" autocomplete="new-password">
                                    <?= form_error('password1', '<small class="text-danger ">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="repeat password" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <!--You can add col-lg-12 if you want -->
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
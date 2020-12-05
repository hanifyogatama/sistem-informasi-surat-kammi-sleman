<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">
                <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="Back"><i class="fas fa-arrow-left"></i></a>

                <form action="<?= base_url('admin/user_management_add'); ?>" method="post">
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_role" name="id_role" value="">
                        <label for="role" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="full name" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_role" name="id_role" value="">
                        <label for="role" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" placeholder="email" value="<?= set_value('email') ?>">
                            <?= form_error('email', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_role" name="id_role" value="">
                        <label for="role" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="password" name="password1">
                                    <?= form_error('password1', '<small class="text-danger ">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="repeat password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <!--You can add col-lg-12 if you want -->
                        <button type="submit" class="btn btn-info btn-sm">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
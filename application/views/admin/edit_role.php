<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">

                <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="Back"><i class="fas fa-arrow-left"></i></a>

                <form action="" method="post">
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_role" name="id_role" value="<?= $role['id_role'] ?>">
                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="role" name="role" value="<?= $role['role'] ?>" placeholder="role">
                            <?= form_error('role', '<small class="text-danger ">', '</small>') ?>
                        </div>
                    </div>
                    <div class="text-right">
                        <!--You can add col-lg-12 if you want -->
                        <button type="submit" name="editrole" class="btn btn-info btn-sm">Edit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
</div>
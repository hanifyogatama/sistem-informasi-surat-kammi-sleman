<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-11">
                <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="Back"><i class="fas fa-arrow-left"></i></a>

                <form autocomplete="off" action="<?= base_url('admin/user_management_add'); ?>" method="post">
                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-8">
                            <input autocomplete="off" type="text" class="form-control" id="nama" name="nama" placeholder="nama lengkap" value="<?= set_value('nama') ?>">
                            <?= form_error('nama', '<small id="clear_nama" class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="<?= set_value('email') ?>" autocomplete="new-password">
                            <?= form_error('email', '<small id="clear_email" class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_role" class="col-sm-2 col-form-label">Role</label>
                        <div class="col-sm-8">
                            <select name="id_role" id="id_role" class="form-control">
                                <option value="">-Pilih-</option>
                                <?php foreach ($userrole as $userrole) : ?>
                                    <option value="<?= $userrole['id_role'] ?>" <?php echo set_select('id_role', $userrole['id_role'], (!empty($data) && $data == $userrole['id_role'] ? TRUE : FALSE)); ?>><?= $userrole['role'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?= form_error('id_role', '<small id="clear_role" class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-8">
                            <div class="row">
                                <div class="col-sm-6 ">
                                    <input type="password" class="form-control form-control-user" id="password1" placeholder="password" name="password1" autocomplete="new-password">
                                    <?= form_error('password1', '<small id="clear_password" class="text-danger ">', '</small>') ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="repeat password" autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6 text-right">
                                    <button type="submit" class="btn btn-info">Add</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
    $(document).ready(function() {

        $("#nama").click(function() {
            $("#clear_nama").remove();
        });

        $("#email").click(function() {
            $("#clear_email").remove();
        });

        $("#password1").click(function() {
            $("#clear_password").remove();
        });

        $("#id_role")
            .change(function() {
                $("#id_role option:selected").each(function() {
                    $("#clear_role").remove();
                });
            });
    });
</script>
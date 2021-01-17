<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-6">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('user/ubahpassword'); ?>" method="POST">
                    <div class="form-group">
                        <label for="old_password">Password Lama</label>
                        <input type="password" class="form-control" value="<?= set_value('old_password') ?>" id="old_password" name="old_password" autocomplete="new-password">
                        <?= form_error('old_password', '<small id="clear_old_password" class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password1">Password Baru</label>
                        <input type="password" class="form-control" id="new_password1" name="new_password1" autocomplete="new-password">
                        <?= form_error('new_password1', '<small id="clear_new_password" class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="new_password2">Ulangi Password Baru</label>
                        <input type="password" class="form-control" id="new_password2" name="new_password2" autocomplete="new-password">

                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $("#old_password").click(function() {
            $("#clear_old_password").remove();
        });

        $("#new_password1").click(function() {
            $("#clear_new_password").remove();
        });
    });
</script>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-lg-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 my-auto">
                            <img src="<?= base_url('assets/img/profile/login-img.jpg') ?>" width="430">
                        </div>

                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <?= $this->session->flashdata('message'); ?>

                                <form id="login_validation" class="user" method="POST" action="<?= base_url('auth'); ?>" autocomplete="off">

                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" autocomplete="off" oninvalid="this.setCustomValidity('email wajib diisi')" onchange="this.setCustomValidity('')" required>
                                        <!-- <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?> -->
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" autocomplete="off" oninvalid="this.setCustomValidity('password wajib diisi')" onchange="this.setCustomValidity('')" required>
                                        <!-- <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?> -->
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Login
                                    </button>
                                </form>

                                <!-- <div class="text-center">
                                    <a class="small" href="<?= base_url('auth/registration') ?>">Create an Account!</a>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<!-- <script>
    function InvalidMsg(textbox) {
        if (textbox.value == '') {
            textbox.setCustomValidity('Lütfen işaretli yerleri doldurunuz');
        } else if (textbox.validity.typeMismatch) {
            {
                textbox.setCustomValidity('please enter a valid email address');
            } else {
                textbox.setCustomValidity('');
            }
            return true;
        }
    }
</script> -->
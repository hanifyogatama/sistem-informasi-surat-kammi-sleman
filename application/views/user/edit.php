<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <?= form_open_multipart('user/edit'); ?>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email']; ?> " readonly>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-2">
                            Gambar
                        </div>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-3">
                                    <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-thumbnail">
                                </div>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                        <label class="custom-file-label" for="gambar">Choose file</label>

                                        <div>
                                            <p>
                                                <small class="text-primary">
                                                    - format file png / jpg</br>
                                                    - ukuran file max 2mb
                                                </small>
                                            </p>
                                        </div>
                                        <?= $this->session->flashdata('message_surat'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-info btn-m ">Edit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
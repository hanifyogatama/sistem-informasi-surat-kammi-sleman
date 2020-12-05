<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?> </h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm  mb-3"><i class="fas fa-arrow-left"></i> Back</a>

                <div class="row">
                    <div class="col-lg-8">
                        <?= form_open_multipart('admin/user_management_edit'); ?>

                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nama" name="nama" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="password1" name="password1" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="password2" name="password2" value="">
                            </div>
                        </div>

                        <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                                <div class="col-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                                        <label class="form-check-label" for="gridRadios1">
                                            Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="col-sm">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                        <label class="form-check-label" for="gridRadios2">
                                            Non Aktif
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <div class="form-group row">
                            <div class="col-sm-2">
                                Foto
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-10 ">
                                <button type="submit" class="btn btn-primary">Edit</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
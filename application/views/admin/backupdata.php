<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm">
                    <div class="card py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Backup Database </div>
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Backup</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card py-2">
                        <div class="card-body">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Restore </div>

                            <div class="col-sm-9">
                                <?= form_open_multipart(''); ?>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="gambar" name="gambar">
                                    <label class="custom-file-label" for="gambar">Choose file</label>
                                </div>
                                </form>
                            </div>
                            <div class="col-sm mt-2 flex-right">
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Restore</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
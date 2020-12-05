<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="card">
                            <div class="card-body align-self-center">
                                <!-- <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Backup Database </div> -->
                                <a href="<?= base_url('admin/backup'); ?>" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Backup Database</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
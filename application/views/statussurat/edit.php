<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">
                <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary  btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                <form action="" method="post">
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_status_surat" name="id_status_surat" value="<?= $status_surat['id_status_surat'] ?>">

                        <label for="kode_surat" class="col-sm-3 col-form-label">Kode Surat</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="kode_surat" name="kode_surat" value="<?= $status_surat['kode_surat'] ?>" placeholder="kode surat" autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="status" class="col-sm-3 col-form-label">Status</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="status" name="status" value="<?= $status_surat['status'] ?>" placeholder="jenis surat" autocomplete="off">
                        </div>
                    </div>
                    <div class="text-right">
                        <!--You can add col-lg-12 if you want -->
                        <button type="submit" name="edit" class="btn btn-info">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
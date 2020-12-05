<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">
                <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary  btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                <form action="" method="post">
                    <!-- <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_instansi" name="id_instansi" value="<?= $instansi['id_instansi'] ?>">

                        <label for="nama_instansi" class="col-sm-2 col-form-label">Instansi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" value="<?= $instansi['nama_instansi'] ?>" placeholder="role">
                            <?= form_error('nama_instansi', '<small class="text-danger ">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $instansi['alamat'] ?>" placeholder="role">
                            <?= form_error('alamat', '<small class="text-danger ">', '</small>') ?>
                        </div>
                    </div> -->
                    <div class="text-right">
                        <!--You can add col-lg-12 if you want -->
                        <button type="submit" name="edit" class="btn btn-info btn-sm">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
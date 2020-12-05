<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">
                <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="back"><i class="fas fa-arrow-left"></i></a>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Instansi</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="">
                    </div>
                </div>
                <div class="form-group row justify-content-end">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
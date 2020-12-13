<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="card mb-0 py-3 ">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Select Data : </div>
                    <div class="">
                        <select name="" id="" class="form-control">
                            <option value="">-Select-</option>
                            <option value="1">Surat Masuk</option>
                            <option value="2">Surat Keluar</option>
                            <option value="3">Disposisi</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- filter by area -->
        <div class="card-body filter-by">
            <div class="row">
                <div class="col-sm">
                    <div class="card py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Filter by Date : </div>
                                    <div class="form-group">
                                        <label for="" class="text-xs font-weight-bold text-danger text-uppercase mb-1 "><small>Start</small></label>
                                        <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="text-xs font-weight-bold text-danger text-uppercase mb-1 align-end"><small>End</small></label>
                                        <input type="date" name="tanggal_diterima" id="tanggal_diterima" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <a href="<?= base_url(''); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" title="Procces"><i class="fas fa-cog fa-sm text-white-50 px-2"></i></a>

                                    <a href="<?= base_url(''); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" title="Print"><i class="fas fa-print fa-sm text-white-50 px-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Filter by Month : </div>
                                    <div class="form-group">
                                        <label for="" class="text-xs font-weight-bold text-danger text-uppercase mb-1 "><small>Year</small></label>
                                        <div class="">
                                            <select name="" id="" class="form-control">
                                                <option value="">-Select-</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="" class="text-xs font-weight-bold text-danger text-uppercase mb-1 "><small>Start</small></label>
                                                <div class="">
                                                    <select name="" id="" class="form-control">
                                                        <option value="">-Select-</option>
                                                        <option value="">Januari</option>
                                                        <option value="">Februari</option>
                                                        <option value="">Maret</option>
                                                        <option value="">April</option>
                                                        <option value="">Mei</option>
                                                        <option value="">Juni</option>
                                                        <option value="">Juli</option>
                                                        <option value="">Agustus</option>
                                                        <option value="">September</option>
                                                        <option value="">Oktober</option>
                                                        <option value="">November</option>
                                                        <option value="">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="" class="text-xs font-weight-bold text-danger text-uppercase mb-1 "><small>End</small></label>
                                                <div class="">
                                                    <select name="" id="" class="form-control">
                                                        <option value="">-Select-</option>
                                                        <option value="">Januari</option>
                                                        <option value="">Februari</option>
                                                        <option value="">Maret</option>
                                                        <option value="">April</option>
                                                        <option value="">Mei</option>
                                                        <option value="">Juni</option>
                                                        <option value="">Juli</option>
                                                        <option value="">Agustus</option>
                                                        <option value="">September</option>
                                                        <option value="">Oktober</option>
                                                        <option value="">November</option>
                                                        <option value="">Desember</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <a href="<?= base_url(''); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" title="Procces"><i class="fas fa-cog fa-sm text-white-50 px-2"></i></a>

                                    <a href="<?= base_url(''); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" title="Print"><i class="fas fa-print fa-sm text-white-50 px-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="card py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Filter by Year : </div>
                                    <div class="form-group">
                                        <label for="" class="text-xs font-weight-bold text-danger text-uppercase mb-1 "><small>Year</small></label>
                                        <div class="">
                                            <select name="" id="" class="form-control">
                                                <option value="">-Select-</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <a href="<?= base_url(''); ?>" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm" title="Procces"><i class="fas fa-cog fa-sm text-white-50 px-2"></i> </a>

                                    <a href="<?= base_url(''); ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" title="Print"><i class="fas fa-print fa-sm text-white-50 px-2"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
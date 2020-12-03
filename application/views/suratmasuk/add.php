<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <?php echo form_open_multipart('suratmasuk/add') ?>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="">
                                    <label>Nomor Surat</label>
                                    <input type="text" name="no_surat" id="no_surat" class="form-control">
                                    <!-- <?php echo form_error('no_surat', '<div class="text-danger small ml-3">', '</div>'); ?> -->
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Pengirim</label>
                                    <input type="text" name="pengirim" id="pengirim" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Tanggal Diterima</label>
                                    <input type="date" name="tanggal_diterima" id="tanggal_diterima" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <div class="">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="5" id="isi" name="isi"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Keterangan<sup> (*optional)</sup></label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan"></textarea>
                                </div>
                            </div>
                            <div class="card mb-4 py-3">
                                <div class="card-body">
                                    <div class="form-group col-md-4">
                                        <label for="">File</label> <br>
                                        <input type="file" name="file_surat" class="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Simpan</button>

                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
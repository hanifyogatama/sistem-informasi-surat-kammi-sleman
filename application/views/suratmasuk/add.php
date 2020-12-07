<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="Back"><i class="fas fa-arrow-left"></i></a>

                    <?php echo form_open_multipart('suratmasuk/add') ?>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="">
                                    <label>Nomor Surat</label>
                                    <input type="text" name="no_surat" id="no_surat" class="form-control" value="<?= set_value('no_surat') ?>">
                                    <?php echo form_error('no_surat', '<div class="text-danger small">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <label>Pengirim</label>
                                    <select name="id_instansi" id="id_instansi" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($instansi as $instansi) : ?>
                                            <option value="<?= $instansi['id_instansi'] ?> "><?= $instansi['nama_instansi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_instansi', '<small class="text-danger ">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <label>Sifat Surat</label>
                                    <select name="id_status_surat" id="id_status_surat" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($status_surat as $status_surat) : ?>
                                            <option value="<?= $status_surat['id_status_surat'] ?>"><?= $status_surat['status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_status_surat', '<small class="text-danger ">', '</small>') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <label>Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" value="<?= set_value('tanggal_surat') ?>">
                                    <?= form_error('tanggal_surat', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Tanggal Diterima</label>
                                    <input type="date" name="tanggal_diterima" id="tanggal_diterima" class="form-control" value="<?= set_value('tanggal_diterima') ?>">
                                    <?= form_error('tanggal_diterima', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <div class="">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="5" id="isi" name="isi"><?= set_value('isi') ?></textarea>
                                    <?= form_error('isi', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan"><?= set_value('keterangan') ?></textarea>
                                    <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="card mb-4 py-3">
                                <div class="card-body">
                                    <div class="form-group col-md-4">
                                        <label for="">File</label> <br>
                                        <input type="file" name="file_surat" class="">
                                    </div>
                                    <?= form_error('file_surat', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-info btn-sm float-right">Add</button>

                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
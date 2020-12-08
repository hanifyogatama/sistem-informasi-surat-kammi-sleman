<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>
        <div class="card-body">
            <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>
            <div class="row">
                <div class="col-md-12">
                    <?php echo form_open_multipart('suratkeluar/edit/' . $surat_keluar['id_surat_keluar']) ?>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <input type="hidden" name="id_surat_keluar" class="form-control" value="<?= $surat_keluar['id_surat_keluar']; ?>">
                            <div class="form-group">
                                <div class="">
                                    <label>Nomor Surat</label>
                                    <input type="text" name="no_surat" class="form-control" id="no_surat" value="<?= $surat_keluar['no_surat']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Pengirim</label>
                                    <select name="id_instansi" id="id_instansi" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($instansi as $instansi) : ?>
                                            <option value="<?= $instansi['id_instansi'] ?>" <?= $instansi['id_instansi'] == $surat_masuk['id_instansi'] ? "selected" : null ?>> <?= $instansi['nama_instansi'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Sifat Surat</label>
                                    <select name="id_status_surat" id="id_status_surat" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($status_surat as $status_surat) : ?>
                                            <option value="<?= $status_surat['id_status_surat'] ?>" <?= $status_surat['id_status_surat'] == $surat_masuk['id_status_surat'] ? "selected" : null ?>><?= $status_surat['status'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Tanggal Surat</label>
                                    <input type="date" name="tanggal_surat" id="tanggal_surat" value="<?= $surat_keluar['tanggal_surat']; ?>" class=" form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <div class="">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" name="isi" rows="5" id="isi"><?= $surat_keluar['isi']; ?></textarea>
                                </div>
                            </div>
                            <div class=" form-group">
                                <div class="">
                                    <label>Keterangan</label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan"><?= $surat_keluar['keterangan']; ?></textarea>
                                </div>
                            </div>

                            <div class=" card mb-4 py-3">
                                <div class="form-group col-md-4">
                                    <label for="file_surat"><Strong>File</Strong></label> <br>
                                    <input type="file" id="file_surat" name="file_surat">
                                    <small>File name now : <?= $surat_keluar['file_surat']; ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm float-right">Edit</button>
                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
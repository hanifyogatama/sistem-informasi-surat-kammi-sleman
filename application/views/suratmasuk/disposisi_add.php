<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-12">
                    <a href="javascript:history.go(-1)" class="btn btn-outline-primary  btn-sm px-3 mb-3" title="Back"><i class="fas fa-arrow-left"></i></a>

                    <?php echo form_open_multipart('suratmasuk/disposisi_add/' . $surat_masuk['id_surat_masuk'])   ?>
                    <div class="form-row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="">
                                    <label>Nomor Surat</label>
                                    <input type="hidden" name="id_surat_masuk" id="id_surat_masuk" class="form-control" value="<?= $surat_masuk['id_surat_masuk'] ?>" readonly>

                                    <input type="text" name="" id="" class="form-control" value="<?= $surat_masuk['no_surat'] ?>" readonly>
                                    <?php echo form_error('id_surat_masuk', '<div class="text-danger small">', '</div>'); ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <label>Jenis Surat</label>

                                    <input type="hidden" name="id_status_surat" id="id_status_surat" class="form-control" value="<?= $surat_masuk['id_status_surat'] ?>" readonly>

                                    <input type="text" name="" id="" class="form-control" value="<?= $surat_masuk['status'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <label>Pengirim</label>

                                    <input type="hidden" name="id_instansi" id="id_instansi" class="form-control" value="<?= $surat_masuk['id_instansi'] ?>" readonly>

                                    <input type="text" name="" id="" class="form-control" value="<?= $surat_masuk['nama_instansi'] ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="">
                                    <label>Tujuan Departemen</label>
                                    <select name="id_departemen" id="id_departemen" class="form-control">
                                        <option value="">-Pilih-</option>
                                        <?php foreach ($departemen as $departemen) : ?>
                                            <option value="<?= $departemen['id_departemen'] ?>" <?php echo set_select('id_departemen', $departemen['id_departemen'], (!empty($data) && $data == $departemen['id_departemen'] ? TRUE : FALSE)); ?>><?= $departemen['nama_departemen'] ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_departemen', '<small id="clear_departemen" class="text-danger ">', '</small>') ?>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="">
                                    <label>Batas Waktu</label>
                                    <input type="date" name="batas_waktu" id="batas_waktu" class="form-control" value="<?= set_value('batas_waktu') ?>">
                                    <?= form_error('batas_waktu', '<small id="clear_batas_waktu" class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-1"></div>

                        <div class="col-lg-5">
                            <div class="form-group">
                                <div class="">
                                    <label>Deskripsi</label>
                                    <textarea class="form-control" rows="5" id="isi" name="isi"><?= set_value('isi') ?></textarea>
                                    <?= form_error('isi', '<small id="clear_isi" class="text-danger">', '</small>') ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="">
                                    <label>Keterangan <sup><em>(*optional)</em></sup></label>
                                    <textarea class="form-control" rows="4" id="keterangan" name="keterangan"><?= set_value('keterangan') ?></textarea>
                                    <?= form_error('keterangan', '<small class="text-danger">', '</small>') ?>
                                </div>
                            </div>

                        </div>
                    </div>
                    <button type="submit" class="btn btn-info  float-right">Add</button>

                    <?php form_close(); ?>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<script>
    $(document).ready(function() {

        $("#id_departemen")
            .change(function() {
                $("#id_departemen option:selected").each(function() {
                    $("#clear_departemen").remove();
                });
            });


        $("#batas_waktu").click(function() {
            $("#clear_batas_waktu").remove();
        });

    });
</script>
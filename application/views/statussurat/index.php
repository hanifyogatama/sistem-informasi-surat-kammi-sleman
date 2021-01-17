<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">

                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
                        <?= $this->session->flashdata('message2'); ?>

                        <?= form_error('status_surat', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <a href="" class="btn btn-outline-primary btn-sm mb-3 px-3" title="Add" data-toggle="modal" data-target="#newStatusSuratModal"><i class="fas fa-plus"> </i></a>

                        <table class="table table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Surat</th>
                                    <th scope="col">Jenis Surat</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($status_surat as $status_surat) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $status_surat['kode_surat']; ?></td>
                                        <td><?= $status_surat['status']; ?></td>
                                        <td>
                                            <a href="<?= base_url('jenissurat/edit/') . $status_surat['id_status_surat']; ?>" class="badge badge-success">edit</a>

                                            <a href="<?= base_url('jenissurat/delete/') . $status_surat['id_status_surat']; ?>" class="badge badge-danger data-delete-2">delete</a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- form model input add status surat  -->
<div class="modal fade" id="newStatusSuratModal" tabindex="-1" role="dialog" aria-labelledby="newDepartemenModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title m-0 font-weight-bold text-primary" id="newDepartemenModalLabel">Add Jenis Surat</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('jenissurat/add'); ?>" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <input type="text" value="<?= set_value('kode_surat') ?>" class="form-control" id="kode_surat" name="kode_surat" placeholder="kode surat" autocomplete="off">
                        <?= form_error('kode_surat', '<small id="clear_kode_surat" class="text-danger ">', '</small>') ?>
                    </div>

                    <div class="form-group">
                        <input type="text" value="<?= set_value('status') ?>" class="form-control" id="status" name="status" placeholder="jenis surat" autocomplete="off">
                        <?= form_error('status', '<small id="clear_status" class="text-danger ">', '</small>') ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $("#kode_surat").click(function() {
            $("#clear_kode_surat").remove();
        });

        $("#status").click(function() {
            $("#clear_status").remove();
        });
    });
</script>
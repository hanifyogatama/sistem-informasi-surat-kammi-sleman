<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <?= $this->session->flashdata('message'); ?>
                    <!-- button -->
                    <?php echo anchor('suratkeluar/add', '<button class="btn btn-outline-primary btn-sm mb-3 px-3" title="Add"><i class="fa fa-plus"></i> </button>'); ?>

                    <?php echo anchor('suratkeluar', '<button class="btn btn-outline-success btn-sm mb-3 px-3 " title="Print"><i class="fa fa-print" ></i> </button>'); ?>

                    <?php echo anchor('suratkeluar', '<button class="btn btn-outline-danger btn-sm mb-3 px-3 " title="Export to pdf"><i class="fa fa-file-pdf" ></i> </button>'); ?>

                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Penerima</th>
                                    <th>Isi</th>
                                    <th>Tanggal Surat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody><?php $i = 1; ?>
                                <?php foreach ($surat_keluar->result() as $key => $data) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                        <td><?= $data->no_surat ?></td>
                                        <td><?= $data->nama_instansi ?></td>
                                        <td><?= $data->isi ?></td>
                                        <td><?= $data->tanggal_surat ?></td>
                                        <td align="center">

                                            <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>
                                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                                <div class="row mx-0 ">

                                                    <div class="col-sm ">
                                                        <a href="<?= base_url('suratkeluar/detail/') . $data->id_surat_keluar ?> " class="btn btn-warning btn-circle btn-sm" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>

                                                    <div class="col-sm ">
                                                        <a href="<?= base_url('suratkeluar/edit/') . $data->id_surat_keluar ?>" class="btn btn-success btn-circle btn-sm" title="edit"><i class="fas fa-edit" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>

                                                    <div class="col-sm ">
                                                        <a href="" data-toggle="modal" data-target="#modal-delete" class="btn btn-danger btn-circle btn-sm" title="delete"><i class="fas fa-trash" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>

                                                </div>
                                            </div>
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

<!--  delete data surat keluar -->

<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="newDeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDeleteModalLabel">Delete data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('suratkeluar/delete/') . $data->id_surat_keluar ?>" method="POST">
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <i class="fas fa-exclamation-circle fa-4x"></i>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_surat_keluar" value="">
                        </div>
                        <div class="form-group">
                            <p>Are you sure you want to delete data?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('suratkeluar/delete/' . $data->id_surat_keluar) ?>" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
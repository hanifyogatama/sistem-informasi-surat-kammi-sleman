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

                        <?= form_error('departemen', '<div class="alert alert-dark" role = "alert">', '</div>') ?>

                        <?php echo anchor('suratmasuk', '<button title="Back" class="btn btn-outline-dark btn-sm mb-3 px-3"><i class="fas fa-arrow-left "></i> </button>'); ?>

                        <?php echo anchor('suratmasuk/disposisi_add/' . $surat_masuk['id_surat_masuk'], '<button title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

                        <?php echo anchor('suratmasuk/printAllDisposisi', '<button title="Print"  class="btn btn-outline-success btn-sm mb-3 px-3 "><i class="fa fa-print "></i> </button>', 'target="_blank"'); ?>

                        <?php echo anchor('suratmasuk/pdfAllDisposisi', '<button title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>

                        <?php echo anchor('suratmasuk/exportToExcel', '<button title="Export to excel" class="btn btn-outline-warning btn-sm mb-3 px-3 "><i class="far fa-file-excel"></i> </button>'); ?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Tujuan Disposisi</th>
                                    <th scope="col">Batas Waktu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($disposisi->result() as $key => $data) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                        <td><?= word_limiter($data->nomor_surat, 1) ?></td>
                                        <td><?= $data->nama_departemen ?></td>
                                        <td><?= $data->batas_waktu ?></td>
                                        <td align="center">

                                            <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>
                                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                                <div class="row justify-content-center text-center">
                                                    <div class="col-sm">
                                                        <a href="<?= base_url('suratmasuk/disposisi_detail/') . $data->id_disposisi ?>" class="btn btn-warning btn-circle btn-sm mx-2" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>

                                                        <a href="<?= base_url('suratmasuk/disposisi_delete/') . $data->id_disposisi ?>" class="btn btn-danger btn-circle btn-sm mx-2 data-delete-2" title="delete"><i class="fas fa-trash" aria-haspopup="true" aria-expanded="false"></i></a>
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
</div>
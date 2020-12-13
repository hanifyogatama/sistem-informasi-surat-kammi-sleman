<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="card-body">
                    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                    <?= $this->session->flashdata('message2'); ?>
                    <!-- button -->
                    <?php echo anchor('suratmasuk/add', '<button title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

                    <?php echo anchor('suratmasuk/print', '<button title="Print"  class="btn btn-outline-success btn-sm mb-3 px-3 "><i class="fa fa-print "></i> </button>'); ?>

                    <?php echo anchor('suratmasuk/exportToPdf', '<button title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>

                    <?php echo anchor('suratmasuk/exportToExcel', '<button title="Export to excel" class="btn btn-outline-warning btn-sm mb-3 px-3 "><i class="far fa-file-excel"></i> </button>'); ?>

                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Pengirim</th>
                                    <th>Isi</th>
                                    <th>Tanggal Surat</th>
                                    <th>Tanggal Diterima</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($surat_masuk->result() as $key => $data) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                        <td><?= $data->no_surat ?></td>
                                        <td><?= $data->nama_instansi ?></td>
                                        <td><?= $data->isi ?></td>
                                        <td><?= $data->tanggal_surat ?></td>
                                        <td><?= $data->tanggal_diterima ?></td>
                                        <!-- <td><?= date('d F Y', $data->tanggal_surat)  ?></td> -->
                                        <td align="center">

                                            <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>
                                            <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                                <div class="row mx-0 ">
                                                    <div class="col-sm px-1">
                                                        <a href="<?= base_url('suratmasuk/disposisi/') . $data->id_surat_masuk  ?>" class="btn btn-info btn-circle btn-sm" title="disposisi"><i class="fas fa-share-square" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>

                                                    <div class="col-sm px-1">
                                                        <a href="<?= base_url('suratmasuk/detail/') . $data->id_surat_masuk ?>" class="btn btn-warning btn-circle btn-sm" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>

                                                    <div class="col-sm px-1">
                                                        <a href="<?= base_url('suratmasuk/edit/') . $data->id_surat_masuk ?>" class="btn btn-success btn-circle btn-sm" title="edit"><i class="fas fa-edit" aria-haspopup="true" aria-expanded="false"></i></a>
                                                    </div>

                                                    <div class="col-sm px-1">
                                                        <a href="<?= base_url('suratmasuk/delete/') . $data->id_surat_masuk ?>" class="btn btn-danger btn-circle btn-sm data-delete-2" title="delete"><i class="fas fa-trash" aria-haspopup="true" aria-expanded="false"></i></a>
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
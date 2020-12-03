<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-lg">

                    <!-- button -->
                    <?php echo anchor('suratmasuk/add', '<button class="btn btn-outline-primary btn-sm mb-3"><i class="fa fa-plus "></i> Add</button>'); ?>

                    <div class="card-body">
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
                                    <?php foreach ($surat_masuk as $sm) : ?>
                                        <tr>
                                            <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                            <td><?= $sm['no_surat']; ?></td>
                                            <td><?= $sm['pengirim'] ?></td>
                                            <td><?= $sm['isi'] ?></td>
                                            <td><?= $sm['tanggal_surat'] ?></td>
                                            <td><?= $sm['tanggal_diterima'] ?></td>
                                            <td align="center">

                                                <button type="button" data-toggle="dropdown" id="dropdownMenuButton" class="btn btn-success btn-circle btn-sm "><i class="fas fa-bars" aria-haspopup="true" aria-expanded="false"></i></button>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('disposisi/') . $sm['id_surat_masuk'] ?>">Disposisi<a>
                                                            <a class="dropdown-item" href="<?= base_url('suratmasuk/detail/') . $sm['id_surat_masuk'] ?>">Detail<a>
                                                                    <a class="dropdown-item" href="<?= base_url('suratmasuk/edit/') . $sm['id_surat_masuk'] ?>">Edit<a>
                                                                            <a class="dropdown-item" href="#">Delete</a>
                                                </div>


                                                <!-- <?php echo anchor('suratmasuk/detail/' . $sm['id_surat_masuk'], ' <div class="btn btn-success btn-circle btn-sm"><i class="fa fa-eye"></i></div>') ?>

                                                <?php echo anchor('suratmasuk/edit/' . $sm['id_surat_masuk'], ' <div class="btn btn-primary btn-circle btn-sm"><i class="fa fa-edit"></i></div>') ?>

                                                <?php echo anchor('suratmasuk/hapus/' . $sm['id_surat_masuk'], ' <div class="btn btn-danger btn-sm btn-circle"><i class="fa fa-trash"></i></div>') ?> -->
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
</div>
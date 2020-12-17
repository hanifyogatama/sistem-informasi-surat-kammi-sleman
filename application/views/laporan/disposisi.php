<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg">

                        <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                        <?php echo anchor('suratkeluar', '<button class="btn btn-outline-danger btn-sm mb-3 px-3 " title="Export to pdf"><i class="fa fa-file-pdf" ></i> </button>'); ?>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nomor Surat</th>
                                    <th scope="col">Tujuan Disposisi</th>
                                    <th scope="col">Status Surat</th>
                                    <th scope="col">Batas Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($disposisi->result() as $key => $data) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                        <td><?= $data->nomor_surat ?></td>
                                        <td><?= $data->nama_departemen ?></td>
                                        <td><?= $data->status ?></td>
                                        <td><?= $data->batas_waktu ?></td>
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
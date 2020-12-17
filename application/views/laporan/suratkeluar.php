<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="card-body">

                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <?php echo anchor('suratkeluar', '<button class="btn btn-outline-danger btn-sm mb-3 px-3 " title="Export to pdf"><i class="fa fa-file-pdf" ></i> </button>'); ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Penerima</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Surat</th>
                            </tr>
                        </thead>
                        <tbody><?php $i = 1; ?>
                            <?php foreach ($surat_keluar->result() as $key => $data) : ?>
                                <tr>
                                    <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                    <td><?= $data->no_surat ?></td>
                                    <td><?= $data->nama_instansi ?></td>
                                    <td><?= word_limiter($data->isi, 3) ?></td>
                                    <?php
                                    $oldate = $data->tanggal_surat;
                                    $newDate = date("d-m-Y", strtotime($oldate)); ?>
                                    <td><?= $newDate ?></td>
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
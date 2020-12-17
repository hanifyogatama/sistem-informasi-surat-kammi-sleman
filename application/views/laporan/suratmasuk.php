<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="card-body">

                    <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                    <form action="" method="GET">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tanggalawal">
                            </div>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tanggalakhir">
                            </div>
                            <div class="col">
                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>

                    <?php
                    $tanggalAwal = $this->input->get('tanggalawal');
                    $tanggalAkhir = $this->input->get('tanggalakhir');
                    $newTanggalAwal = date("d-m-Y", strtotime($tanggalAwal));
                    $newTanggalAkhir = date("d-m-Y", strtotime($tanggalAkhir));
                    ?>

                    <?php if (!$tanggalAwal && !$tanggalAkhir) :  ?>
                        <?php echo anchor('suratmasuk/exportToPdf', '<button title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>
                        <h6 class="font-weight-bold mt-2 text-primary">Laporan Surat Masuk tanggal <?= date('d F Y'); ?></h6>
                    <?php else : ?>
                        <?php echo anchor('laporan/pdfSuratMasuk?tanggalawal=' . $tanggalAwal . '&tanggalakhir=' . $tanggalAkhir, '<button title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>


                        <h6 class="font-weight-bold mt-2 text-primary">Laporan surat masuk tanggal <?= $newTanggalAwal . ' s/d ' . $newTanggalAkhir ?></h6>
                    <?php endif; ?>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No Surat</th>
                                <th>Pengirim</th>
                                <th>Deskripsi</th>
                                <th>Tanggal Surat</th>
                                <th>Tanggal Diterima</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($surat_masuk->result() as $key => $data) : ?>
                                <tr>
                                    <th scope="row" style="text-align: center;"><?= $i; ?></th>
                                    <td><?= $data->no_surat ?></td>
                                    <td><?= $data->nama_instansi ?></td>
                                    <td><?= word_limiter($data->isi, 3) ?></td>

                                    <?php
                                    $oldDateSurat = $data->tanggal_surat;
                                    $oldDateDiterima = $data->tanggal_diterima;
                                    $newDateSurat = date("d-m-Y", strtotime($oldDateSurat));
                                    $newDateDiterima = date("d-m-Y", strtotime($oldDateDiterima)); ?>

                                    <td><?= $newDateSurat ?></td>
                                    <td><?= $newDateDiterima ?></td>
                                    <!-- <td><?= date('d F Y', $data->tanggal_surat)  ?></td> -->
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
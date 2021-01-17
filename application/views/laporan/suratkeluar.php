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
                                <input type="date" class="form-control" name="tanggalawal" title="tanggal awal">
                            </div>
                            <div class="my-auto"><i class="fas fa-arrows-alt-h"></i></div>
                            <div class="col-sm-3">
                                <input type="date" class="form-control" name="tanggalakhir" title="tanggal akhir">
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
                        <?php echo anchor('suratkeluar/exportToPdf', '<button title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>

                        <?php echo anchor('suratkeluar/exportToExcel', '<button title="Export to excel" class="btn btn-outline-warning btn-sm mb-3 px-3 "><i class="fa fa-file-excel"></i> </button>'); ?>

                        <h6 class="font-weight-bold mt-2 text-primary text-center">Laporan surat keluar tanggal <?= date('d-m-Y'); ?></h6><br>
                    <?php else : ?>
                        <?php echo anchor('laporan/pdfSuratKeluar?tanggalawal=' . $tanggalAwal . '&tanggalakhir=' . $tanggalAkhir, '<button title="Export to pdf" class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>

                        <?php echo anchor('laporan/exportExcelSuratKeluar?tanggalawal=' . $tanggalAwal . '&tanggalakhir=' . $tanggalAkhir, '<button title="Export to excel" class="btn btn-outline-warning btn-sm mb-3 px-3 "><i class="fa fa-file-excel "></i> </button>'); ?>

                        <h6 class="font-weight-bold mt-2 text-primary text-center">Laporan surat keluar tanggal <?= $newTanggalAwal . ' s/d ' . $newTanggalAkhir ?></h6><br>
                    <?php endif; ?>

                    <table class="table table-hover" id="dataTable">
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
                                    <td><?= word_limiter($data->nama_instansi, 3) ?></td>
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
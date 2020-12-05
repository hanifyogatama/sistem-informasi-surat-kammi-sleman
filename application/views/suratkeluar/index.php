<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title  ?></h6>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="card-body">

                    <!-- button -->
                    <?php echo anchor('suratkeluar/add', '<button class="btn btn-outline-primary btn-sm mb-3 px-3"><i class="fa fa-plus "></i> </button>'); ?>

                    <?php echo anchor('suratkeluar', '<button class="btn btn-outline-success btn-sm mb-3 px-3 "><i class="fa fa-print "></i> </button>'); ?>

                    <?php echo anchor('suratkeluar/export', '<button class="btn btn-outline-danger btn-sm mb-3 px-3 "><i class="fa fa-file-pdf "></i> </button>'); ?>

                    <!-- table  -->
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>No Surat</th>
                                    <th>Pengirim</th>
                                    <th>Isi</th>
                                    <th>Tanggal Dibuat</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>21</td>
                                    <td>21</td>
                                    <td>21</td>
                                    <td>21</td>
                                    <td>21</td>
                                    <td align="center">

                                        <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <div class="row mx-0 ">
                                                <div class="col-sm px-1">
                                                    <a href="" class="btn btn-info btn-circle btn-sm" title="dispoisi"><i class="fas fa-key" aria-haspopup="true" aria-expanded="false"></i></a>
                                                </div>

                                                <div class="col-sm px-1">
                                                    <a href="" class="btn btn-warning btn-circle btn-sm" title="detail"><i class="fas fa-eye" aria-haspopup="true" aria-expanded="false"></i></a>
                                                </div>

                                                <div class="col-sm px-1">
                                                    <a href="" class="btn btn-success btn-circle btn-sm" title="edit"><i class="fas fa-edit" aria-haspopup="true" aria-expanded="false"></i></a>
                                                </div>

                                                <div class="col-sm px-1">
                                                    <a href="" class="btn btn-danger btn-circle btn-sm" title="delete"><i class="fas fa-trash" aria-haspopup="true" aria-expanded="false"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
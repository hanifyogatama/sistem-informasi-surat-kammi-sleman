<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <?= $this->session->flashdata('message'); ?>

            <div class="row justify-content-center">
                <img src="<?= base_url('assets/img/profile/') . $user['gambar']; ?>" class="img-profile rounded-circle shadow" width="150px" height="150px"><br> <br>
            </div>
            <br>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="col-md">
                        <table class="table">
                            <tr>
                                <th width="200">Full Name</th>
                                <td><?= $user['nama']; ?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?= $user['email']; ?></td>
                            </tr>
                            <tr>
                                <th>Date Created</th>
                                <td><?= date('d F Y', $user['tanggal_dibuat']); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <br>
                <br>
            </div>
            <br>
        </div>
    </div>

</div>






</div>
<!-- End of Main Content -->
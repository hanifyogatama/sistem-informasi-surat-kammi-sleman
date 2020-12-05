<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?><strong>
                    <div class="badge badge-warning">who ?</div>
                </strong></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <a href="javascript:history.go(-1)" class="btn btn-outline-primary btn-sm mb-3"><i class="fas fa-arrow-left"></i> Back</a>

                <a href="<?= base_url('admin/user_management_edit') ?>" class="btn btn-outline-success btn-sm mb-3"><i class="fas fa-edit"></i> Edit</a>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card-body">
                            <img src="" class="card-img-top" height="200px" width="100px">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <table class="table">
                            <br>
                            <tr>
                                <td>Full Name</td>
                                <td><strong>none</strong></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><strong>none</strong></td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td><strong>none</strong></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>
                                    <strong>
                                        <div class="badge badge-success">aktiv</div>
                                    </strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
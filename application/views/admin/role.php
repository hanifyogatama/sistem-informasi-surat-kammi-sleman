<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg">
                <div class="row">
                    <div class="col-lg-6">
                        <?= form_error('menu', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <?= $this->session->flashdata('message'); ?>

                        <!-- <button type="button" href="" title="Add" class="btn btn-outline-primary btn-sm mb-3 px-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-plus"></i> </button> -->

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($role as $role) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $role['role']; ?></td>
                                        <td>
                                            <a href="<?= base_url('admin/roleaccess/') . $role['id_role']; ?>" class="badge badge-warning">access</a>

                                            <!-- <a href="<?= base_url('admin/editRole/') . $role['id_role']; ?>" class="badge badge-success">edit</a> -->

                                            <!-- <a href="" class="badge badge-danger">delete</a> -->
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
    <!-- Page Heading -->
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- add With Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" role="dialog" aria-labelledby="newRoleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('admin/role'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="role" name="role" placeholder="role name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- edit role -->

<!-- <script>
    $('button.open-modal').on('click', function(e) {
        // Make sure the click of the button doesn't perform any action
        e.preventDefault();

        // Get the modal by ID
        var modal = $('#edit-Modal');

        // Set the value of the input fields
        modal.find('#id_role').text($(this).data('id'));
        modal.find('#role').text($(this).data('role'));
    });
</script> -->
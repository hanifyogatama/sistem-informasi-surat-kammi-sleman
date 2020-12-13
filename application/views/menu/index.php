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
                        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

                        <?= $this->session->flashdata('message2'); ?>

                        <?= form_error('menu', '<div class="alert alert-danger" role = "alert">', '</div>') ?>

                        <a href="" class="btn btn-outline-primary btn-sm mb-3 px-3" title="Add" data-toggle="modal" data-target="#newMenuModal"><i class="fas fa-plus"> </i></a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $menu) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $menu['menu']; ?></td>
                                        <td>
                                            <a href="<?= base_url('menu/menu_edit/') . $menu['id_menu']; ?>" class="badge badge-success">edit</a>

                                            <a href="<?= base_url('menu/menu_delete/') . $menu['id_menu']; ?>" class="badge badge-danger data-delete-2">delete</a>
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
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- add With Modal -->
<div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="menu" name="menu" placeholder="menu name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
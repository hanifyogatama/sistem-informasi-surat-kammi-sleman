<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg">
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?>


                    <?= $this->session->flashdata('message'); ?>

                    <a href="" class="btn btn-outline-primary btn-sm px-3 mb-3" title="Add" data-toggle="modal" data-target="#newSubMenuModal"><i class="fas fa-plus"></i></a>

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Menu</th>
                                <th scope="col">Url</th>
                                <th scope="col">Icon</th>
                                <th scope="col">Active</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1; ?>
                            <?php foreach ($submenu as $submenu) : ?>
                                <tr>
                                    <th scope="row"><?= $i; ?></th>
                                    <td><?= $submenu['title']; ?></td>
                                    <td><?= $submenu['menu']; ?></td>
                                    <td><?= $submenu['url']; ?></td>
                                    <td><?= $submenu['icon']; ?></td>
                                    <td><?= $submenu['is_active']; ?></td>
                                    <td align="center">
                                        <a type="button" data-toggle="dropdown" id="dropdownMenuButton"><i class="fas fa-bars text-dark"></i></a>
                                        <div class="dropdown-menu shadow" aria-labelledby="dropdownMenuButton">
                                            <div class="row justify-content-center text-center">
                                                <div class="col-sm">
                                                    <a href="<?= base_url('menu/submenu_edit/') . $submenu['id_sub_menu'] ?>" class="btn btn-primary btn-circle btn-sm mx-3" title="edit"><i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="" class="btn btn-danger btn-circle btn-sm mx-3" title="delete" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash"></i></a>

                                                </div>


                                            </div>
                                        </div>
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
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->


<!-- add With Modal -->
<div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newSubMenuModalLabel">Add New Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="title" name="title" placeholder="sub menu title">
                    </div>
                    <div class="form-group">
                        <select name="id_menu" id="id_menu" class="form-control">
                            <option value="">Select Menu</option>
                            <?php foreach ($menu as $menu) : ?>
                                <option value="<?= $menu['id_menu'] ?>"><?= $menu['menu'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="url" name="url" placeholder="url">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="icon" name="icon" placeholder="icon">
                    </div>
                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Active?
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-info btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
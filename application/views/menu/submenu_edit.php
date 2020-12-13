<div class="container-fluid">
    <div class="card shadow-sm border-bottom-primary">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $title; ?></h6>
        </div>
        <div class="card-body">
            <div class="col-lg-8">
                <a href="javascript:history.go(-1)" title="Back" class="btn btn-outline-primary  btn-sm px-3 mb-3"><i class="fas fa-arrow-left"></i></a>

                <form action="" method="post">
                    <div class="form-group row">
                        <input type="hidden" class="form-control" id="id_sub_menu" name="id_sub_menu" value="<?= $submenu['id_sub_menu'] ?>">

                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $submenu['title'] ?>" placeholder="title">
                            <?= form_error('title', '<small class="text-danger ">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="id_menu" class="col-sm-2 col-form-label">Menu</label>
                        <div class="col-sm-10 ">
                            <select name="id_menu" id="id_menu" class="form-control">
                                <option value="">-Select-</option>
                                <?php foreach ($menu as $menu) : ?>
                                    <option value="<?= $menu['id_menu'] ?>" <?= $menu['id_menu'] == $submenu['id_menu'] ? "selected" : null ?>><?= $menu['menu'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-sm-2 col-form-label">Url</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="url" name="url" value="<?= $submenu['url'] ?>" placeholder="url">
                            <?= form_error('url', '<small class="text-danger ">', '</small>') ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="icon" class="col-sm-2 col-form-label">Icon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="icon" name="icon" value="<?= $submenu['icon'] ?>" placeholder="icon">
                            <?= form_error('icon', '<small class="text-danger ">', '</small>') ?>
                        </div>
                    </div>

                    <div class="text-right">
                        <!--You can add col-lg-12 if you want -->
                        <button type="submit" name="submenu_edit" class="btn btn-info">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
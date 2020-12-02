        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Kammi Sleman</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- querry from menu -->
            <?php
            $roleId = $this->session->userdata('id_role');
            $queryMenu = " SELECT `user_menu`.`id_menu`,`menu`
                        FROM `user_menu` JOIN `user_access_menu` 
                        ON `user_menu`.`id_menu` = `user_access_menu`.`id_menu`
                        WHERE `user_access_menu`.`id_role` = $roleId
                        ORDER BY `user_access_menu`.`id_menu` ASC ";
            $menu = $this->db->query($queryMenu)->result_array();

            ?>

            <!-- looping menu -->
            <?php foreach ($menu as $menu) : ?>
                <div class="sidebar-heading">
                    <?= $menu['menu'] ?>
                </div>

                <!-- sub menu looping -->
                <?php
                $menuId = $menu['id_menu'];
                $querySubMenu = " SELECT *
                                FROM `user_sub_menu` JOIN `user_menu` 
                                ON `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
                                WHERE `user_sub_menu`.`id_menu` = $menuId
                                AND `user_sub_menu`.`is_active` = 1 ";

                $subMenu = $this->db->query($querySubMenu)->result_array();
                ?>

                <?php foreach ($subMenu as $subMenu) : ?>
                    <?php if ($title == $subMenu['title']) : ?>
                        <li class="nav-item active">
                        <?php else : ?>
                        <li class="nav-item">
                        <?php endif; ?>
                        <a class="nav-link pb-0" href="<?= base_url($subMenu['url']) ?>">
                            <i class="<?= $subMenu['icon'] ?>"></i>
                            <span><?= $subMenu['title'] ?></span></a>
                        </li>
                    <?php endforeach; ?>

                    <hr class="sidebar-divider mt-3">

                <?php endforeach; ?>

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>

        </ul>
        <!-- End of Sidebar -->
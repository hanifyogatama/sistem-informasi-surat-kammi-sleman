    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; KAMMI Kamda Sleman 2020 - <?= date("Y"); ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="m-0 font-weight-bold text-primary">Logout<strong></strong></h6>

                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row justify-content-center">
                        <img src="<?= base_url('assets/img/web/logout.gif') ?>" width="200px" alt="">
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="id_surat_keluar" value="">
                        </div>
                        <div class="form-group">
                            <p>Are you sure you want to exit?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-warning btn-sm" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger btn-sm" href="<?= base_url('auth/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->

    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>

    <script src="<?= base_url('assets/'); ?>js-sweet-alert/sweetalert2.all.min.js"></script>

    <!-- input validation -->
    <script src="<?= base_url('assets/'); ?>js/inputSuratMasukValidation.js"></script>
    <!-- <script src="<?= base_url('assets/'); ?>js/inputSuratKeluarValidation.js"></script>
    <script src="<?= base_url('assets/'); ?>js/inputDisposisiValidation.js"></script> -->

    <!-- delete modal  -->
    <script src="<?= base_url('assets/'); ?>js/myscript.js"></script>


    <script>
        // jquary tampil nama file
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass(" selected").html(fileName);

        });

        // ajax menu 
        $('.form-check-input').on('click', function() {
            const menuId = $(this).data('menu');
            const roleId = $(this).data('role');
            $.ajax({
                url: "<?= base_url('admin/changeaccess'); ?>",
                type: 'post',
                data: {
                    menuId: menuId,
                    roleId: roleId
                },
                success: function() {
                    document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
                }
            });
        });

        // date 
        $(function() {
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });

        // tooltip 
        $(document).ready(function() {
            $('[data-toggle="tooltip" ]').tooltip();
        });
    </script>

    </body>

    </html>
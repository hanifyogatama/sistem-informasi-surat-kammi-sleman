<div class="table-responsive">
    <?php if (sizeof($query) < 1) : ?>
        No record in the database.
    <?php else : ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>CONTENT</th>
                    <th>LAST UPDATE</th>
                    <th>ACTIONS</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($query as $record) : ?>
                    <tr>
                        <td><?php echo $record->Id; ?></td>
                        <td><?php echo word_limiter($record->Title, 5); ?></td>
                        <td><?php echo word_limiter($record->Paragraph, 15); ?></td>
                        <td><?php echo $record->Lastupdate; ?></td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="<?php echo base_url('gallery/view') . '/' . $record->Id; ?>" class="btn btn-info">View</a>
                                <a href="#" class="btn btn-success">Edit</a>
                                <a href="" class="btn btn-danger" data-toggle="modal" onclick="confirm_modal('<?php echo site_url("controller/function/" . $record->Id); ?>','Title');" data-target="#myModal">Delete</a>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>


        <!-- (Normal Modal)-->
        <div class="modal fade" id="modal_delete_m_n" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content" style="margin-top:100px;">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" style="text-align:center;">Are you sure to Delete this <span class="grt"></span> ?</h4>
                    </div>

                    <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                        <span id="preloader-delete"></span>
                        </br>
                        <a class="btn btn-danger" id="delete_link_m_n" href="">Delete</a>
                        <button type="button" class="btn btn-info" data-dismiss="modal" id="delete_cancel_link">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
        <script>
            function confirm_modal(delete_url, title) {
                jQuery('#modal_delete_m_n').modal('show', {
                    backdrop: 'static',
                    keyboard: false
                });
                jQuery("#modal_delete_m_n .grt").text(title);
                document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
                document.getElementById('delete_link_m_n').focus();
            }
        </script>
    <?php endif; ?>
</div>
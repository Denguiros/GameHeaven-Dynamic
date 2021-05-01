<?php $this->_t = $curr;
?>


<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">

        <h6 class="m-0 font-weight-bold text-primary"><?= $curr ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Register Date</th>
                        <th>Verified</th>
                        <th>Publisher</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Register Date</th>
                        <th>Verified</th>
                        <th>Publisher</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($users as $user) {
                    ?>
                        <tr>
                            <td><?= $user->user_first_name == null ? 'None' : $user->user_first_name ?></td>
                            <td><?= $user->user_last_name == null ? 'None' : $user->user_last_name ?></td>
                            <td><?= $user->user_username ?> </td>
                            <td><?= $user->user_email ?></td>
                            <td><?= $user->user_register_date ?></td>
                            <td><?php if ($user->isVerified()) { ?> 
                                    <i class="fas fa-check"></i>
                                <?php } else { ?> 
                                    <i class="fas fa-times"></i>
                                <?php } ?> 
                            </td>
                            <td><?= $user->publisher_name ?></td>
                            <td>
                                <form method="POST">
                                    <input type="hidden" name="uid" value="<?= $user->user_id ?>">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <?php
                                            if ($user->isVerified()) {
                                            ?>
                                                <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
               .attr('type', 'hidden')
               .attr('name', 'dissaproveUser'));
        $(this).closest('form').submit();">Disapprove</a>

                                            <?php } else { ?>
                                                <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
               .attr('type', 'hidden')
               .attr('name', 'approveUser'));
        $(this).closest('form').submit();">Approve</a>
                                            <?php } ?>
                                            
                                        <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
               .attr('type', 'hidden')
               .attr('name', 'deleteUser'));
        $(this).closest('form').submit();">Delete</a>
                                        </div>
                                    </div>
                                </form>
                            </td>

                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>



<!-- Page level plugins -->
<script src="<?= AdminPanel ?>views/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= AdminPanel ?>views/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= AdminPanel ?>views/assets/js/demo/datatables-demo.js"></script>
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
                        <th>Name</th>
                        <th>Website</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Youtube</th>
                        <th>Twitch</th>
                        <th>Is Verified</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Website</th>
                        <th>Facebook</th>
                        <th>Twitter</th>
                        <th>Youtube</th>
                        <th>Twitch</th>
                        <th>Is Verified</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                    foreach ($publishers as $publisher) {
                    ?>
                        <tr>
                            <td><?= $publisher->publisher_name ?></td>
                            <td><?= $publisher->publisher_website == null ? 'None' : '<a href="'.$publisher->publisher_website.'">Website</a>' ?></td>
                            <td><?= $publisher->publisher_facebook == null ? 'None' : '<a href="'.$publisher->publisher_facebook.'">Facebook</a>' ?></td>
                            <td><?= $publisher->publisher_twitter == null ? 'None' : '<a href="'.$publisher->publisher_twitter.'">Twitter</a>' ?></td>
                            <td><?= $publisher->publisher_youtube == null ? 'None' : '<a href="'.$publisher->publisher_youtube.'">Youtube</a>' ?></td>
                            <td><?= $publisher->publisher_twitch == null ? 'None' : '<a href="'.$publisher->publisher_twitch.'">Twitch</a>' ?></td>
                            <td><?php if ($publisher->isVerified()) {
                                ?> <i class="fas fa-check"></i>
                                <?php } else {

                                ?> <i class="fas fa-times"></i><?php } ?> </td>
                            <td>
                                <form action="" method="POST" > 
                                    <input type="hidden" name="pubId" value="<?=$publisher->publisher_id?>">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">

                                <?php
                                    if ($publisher->isVerified()) {
                                    ?>
                                    <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
               .attr('type', 'hidden')
               .attr('name', 'dissapprovePub'));
        $(this).closest('form').submit();">Disapprove</a>
                                    
                                <?php } else { ?>
                                    <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
               .attr('type', 'hidden')
               .attr('name', 'approvePub'));
        $(this).closest('form').submit();">Approve</a>
                                <?php }
                                ?>
                                  <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
               .attr('type', 'hidden')
               .attr('name', 'deletePub'));
        $(this).closest('form').submit();">Delete</a>
                                </form>    
                            
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Page level plugins -->
<script src="<?=AdminPanel?>views/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=AdminPanel?>views/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=AdminPanel?>views/assets/js/demo/datatables-demo.js"></script>
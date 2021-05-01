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
                <?php if ($curr !== "Retro Games" && $curr !== "Reported Games") { ?>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Publisher</th>
                            <th>Price</th>
                            <th>Genres</th>
                            <th>Release date</th>
                            <th>Is Verified</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Publisher</th>
                            <th>Price</th>
                            <th>Genres</th>
                            <th>Release date</th>
                            <th>Is Verified</th>
                            <th>Action</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($games as $game) {
                        ?>
                            <tr>
                                <td><a href="../game/<?=$game->game_id?>"><?= $game->game_name ?></a></td>
                                <td><?= $game->publisher_name ?></td>
                                <td><?= $game->getDiscountedPrice() ?>$</td>
                                <td><?= $game->game_genres ?></td>
                                <td><?= $game->getReleaseDate() ?></td>
                                <td><?php if ($game->isVerified()) {
                                    ?> <i class="fas fa-check"></i>
                                    <?php } else {

                                    ?> <i class="fas fa-times"></i><?php } ?> </td>
                                <td style="text-align:center;">
                                    <form method="POST" id="form1">
                                        <input type="hidden" name="gid" value="<?= $game->game_id ?>">
                                        <input type="hidden" name="gfolder" value="<?= $game->game_folder ?>">

                                        <?php
                                        if ($curr == "Recommended Games") { ?>
                                            <button type="submit" name="removeFromRec" style="width:90%;margin:3%">Remove from list</button>
                                </td>
                                </form>
                            <?php
                                        } else if ($curr == "Featured Games") {

                            ?>
                                <button type="submit" name="removeFromFeatured" style="width:90%;margin:3%">Remove from list</button>
                                </td>
                                </form>
                            <?php
                                        } else { ?>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <?php if ($game->isVerified()) { ?>

                                            <?php if ($game->isVerified()) { ?>
                                                <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                                .attr('type', 'hidden')
                                                .attr('name', 'dissaproveGame'));
                                            $(this).closest('form').submit();">Disapprove</a>
                                            <?php }
                                                if (!$game->isRecommended) {


                                            ?> <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                            .attr('type', 'hidden')
                                            .attr('name', 'addToRec'));
                                            $(this).closest('form').submit();">Recommend</a> <?php } else {
                                                                                                ?>
                                                <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                                    .attr('type', 'hidden')
                                                    .attr('name', 'removeFromRec'));
                                                    $(this).closest('form').submit();">Remove recommendation</a>
                                            <?php } ?>
                                            <?php
                                                if (!$game->isFeatured) {


                                            ?>
                                                <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                                        .attr('type', 'hidden')
                                                        .attr('name', 'addToFeatured'));
                                                        $(this).closest('form').submit();">Feature</a>
                                            <?php } else {
                                            ?>
                                                <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                                .attr('type', 'hidden')
                                                .attr('name', 'removeFromFeatured'));
                                                $(this).closest('form').submit();">Remove Feature</a>
                                            <?php } ?>
                                            <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                                            .attr('type', 'hidden')
                                                            .attr('name', 'deleteGame'));
                                                        $(this).closest('form').submit();">Delete</a>

                                            </td>
                                            </form>
                                        <?php } else {

                                        ?>
                                            <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                            .attr('type', 'hidden')
                                            .attr('name', 'approveGame'));
                                            $(this).closest('form').submit();">Approve</a>
                                            <a class="dropdown-item" href="#" onclick="$(this).closest('form').append($('<input>')
                                                                .attr('type', 'hidden')
                                                                .attr('name', 'deleteGame'));
                                                                $(this).closest('form').submit();">Delete</a>
                                    <?php }
                                        } ?>
                                    </div>
                                </div>
                                </td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?>
                    <?php
                } else if ($curr === "Retro Games") {


                    ?>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>File name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>File name</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($games as $game) {
                        ?>
                            <tr>
                                <td><?= $game["game_name"] ?></td>
                                <td><?= $game["game_file_name"] ?></td>
                                <td><?= $game["game_description"] ?></td>
                            </tr>
                        <?php } ?>
                    <tbody>
                    <?php } else { ?>

                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Reason</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Reason</th>
                            <th>Description</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        foreach ($games as $game) {
                        ?>
                            <tr>
                                <td><?= $game->game_name ?></td>
                                <td><?= $game->game_report_reason ?></td>
                                <td><?= $game->game_report_description ?></td>
                            </tr>
                        <?php } ?>
                    <tbody>

                    <?php
                }
                    ?>
        </div>
    </div>

    </tbody>
    </table>
</div>



<!-- Page level plugins -->
<script src="<?= AdminPanel ?>views/assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= AdminPanel ?>views/assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= AdminPanel ?>views/assets/js/demo/datatables-demo.js"></script>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$this->_t = $user->user_username."'s Profile";
?>




<div style="margin-right: 15%;margin-left: 15%;margin-top: 5%;">
    <div class="container-fluid">
        <div class="row" style="margin-bottom: 5%;">
            <div class="col-sm-12 col-md-9 col-lg-9 col-xl-5 text-left">
                <div class="card-container">

                    <div class="image-container">
                        <?php
                        if ($user->user_profile_picture === null) {
                        ?>
                            <img src="<?php echo (GameHeaven) ?>/views/assets/img/unknown_user.jpg" />

                        <?php
                        } else {
                        ?>
                            <img src="<?= GameHeaven . "users/" . $_SESSION["user"]->user_id . "/" . $_SESSION["user"]->user_profile_picture ?>" />
                        <?php
                        }
                        ?>

                    </div>

                    <div class="lower-container">
                        <div>

                            <h4><?= $user->user_username ?></h4>

                        </div>
                        <div>
                            <p>Member since <?= $user->user_register_date ?>
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div>
                    <ul class="nav nav-tabs">
                        <?php if (count($user->games) > 0) {
                        ?>
                            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">All Games</a></li>
                        <?php } ?>
                    </ul>
                    <div class="tab-content">

                        <?php if (count($user->games) > 0) {
                        ?>
                            <div class="tab-pane active" role="tabpanel" id="tab-1">
                                <!--Section: Block Content-->
                                <section>
                                    <?php
                                    foreach ($user->games as $game) {
                                    ?>
                                        <div class="product-list">
                                            <a href="<?= GameHeaven . 'game/' . $game->game_id ?>" target="_blank">
                                                <div class="row mb-4 ">
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <div class="cycle-slideshow" id="slideshow<?= $game->generateRandomNumber() ?>" data-cycle-fx="fadeout" data-cycle-manual-fx="scrollHorz" data-cycle-timeout="500">
                                                            <?php
                                                            foreach ($game->getImages() as $image) {
                                                            ?>
                                                                <img src="<?= GameHeaven . $image ?>">
                                                            <?php
                                                            }
                                                            ?>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-7 col-lg-9 col-xl-9">
                                                        <div class="row">
                                                            <div class="col-lg-7 col-xl-7">

                                                                <h5><?= htmlentities($game->game_name) ?><?php if ($game->game_verified == 0) {
                                                                                                            ?><i class="fas fa-not-equal" title="Not yet verified"></i>
                                                                <?php
                                                                                                            } ?></h5>
                                                                <p class="mb-2 text-muted text-uppercase small"><?= $game->releaseDate() ?></p>
                                                                <hr>
                                                                <p class="text-left">
                                                                    <?php
                                                                    foreach ($game->game_genres as $genre) {
                                                                    ?>

                                                                        <span class="badge badge-light" style="background-color: rgb(88,91,94);margin-right: 0.3em;"><?= $genre ?></span>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </p>
                                                                <p class="mb-lg-0" style="color:white;">
                                                                    <?php
                                                                    foreach ($game->game_platforms as $platform) {
                                                                    ?>
                                                                        <i class="fab fa-<?= $platform ?>" style="color: rgb(255,255,255);margin-right:0.3em;margin-bottom:0.3em"></i>
                                                                    <?php }
                                                                    ?>
                                                                </p>

                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php   } ?>
                                </section>
                                <!--Section: Block Content-->
                            </div>

                        <?php
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
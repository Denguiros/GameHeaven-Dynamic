<?php $this->_t =  $data['publisher']->publisher_name; 
if(!$data['publisher']->isVerified())
{
    header("Location:".GameHeaven);
}
?>






<!-- Modal -->
<div class="modal fade" id="deleteFranchiseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove Franchise</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to remove this franchise ? (Games within this franchise will not be removed)
            </div>
            <div class="modal-footer">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="franchise_id" id="franchise_id" value="123">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="removeFranchise">Remove</button>

                </form>

            </div>
        </div>
    </div>
</div>




<div style="margin-right: 15%;margin-left: 15%;margin-top: 5%;">
    <div class="container-fluid">
        <div class="row" style="margin-bottom: 5%;">
            <div class="col-sm-6 col-md-3 col-lg-2 col-xl-2 text-left"><img class="publisherLogo rounded-circle" src="<?= GameHeaven . $data['publisher']->getLogo() ?>" style="max-width: 300px;">
            </div>
            <div class="col-auto col-sm-6 col-md-9">
                <h1 class="white-text"><?= $data['publisher']->publisher_name ?></h1>
                <ul class="list-inline" style="color: rgb(255,255,255);font-size: 2em;">
                    <?php if ($data['publisher']->publisher_facebook) {
                    ?>
                        <li class="list-inline-item"><a href="<?= $data['publisher']->publisher_facebook ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <?php }
                    ?>
                    <?php if ($data['publisher']->publisher_twitter) {
                    ?>
                        <li class="list-inline-item"><a href="<?= $data['publisher']->publisher_twitter ?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
                    <?php }
                    ?>
                    <?php if ($data['publisher']->publisher_youtube) {
                    ?>
                        <li class="list-inline-item"><a href="<?= $data['publisher']->publisher_youtube ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    <?php }
                    ?>
                    <?php if ($data['publisher']->publisher_twitter) { ?>
                        <li class="list-inline-item"><a href="<?= $data['publisher']->publisher_twitter ?>" target="_blank"><i class="fab fa-twitch"></i></a></li>
                    <?php }
                    ?>
                    <?php if ($data['publisher']->publisher_website) {
                    ?>
                        <li class="list-inline-item"><a href="<?= $data['publisher']->publisher_website ?>" target="_blank">Official website</a></li>
                    <?php } ?>
                </ul>
                <?php if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {
                ?>
                    <button class="btn btn-secondary" type="button" onclick="location.href='<?= GameHeaven ?>AddGame';">Add a game</button>
                <?php
                } ?>

            </div>
        </div>
        <div class="row" style="margin-bottom: 5%;">
            <div class="col-sm-auto col-md-auto">
                <?php
                $numItems = 0;
                foreach ($data["franchises"] as $franchise) {
                    if (count($franchise->games) > 0) {
                        $numItems++;
                    }
                }

                if ($numItems > 0) {

                ?>
                    <h1 style="color: rgb(255,255,255);">Franchises</h1>
                <?php
                }

                ?>
                <!--Carousel Wrapper-->


                <div id="multi-item-example" class="carousel slide carousel-multi-item " data-ride="carousel" style="padding: 2em;">
                    <!--.Controls-->
                    <?php

                    if ($numItems > 3) {

                    ?>
                        <div>
                            <a href="#multi-item-example" role="button" data-slide="prev" class="carousel-control-prev text-danger" style="font-size: 2em; width: 1em;">
                                <i class="fa fa-chevron-left"></i>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a href="#multi-item-example" role="button" data-slide="next" class="carousel-control-next text-danger" style="font-size: 2em;width: 1em;">
                                <i class="fa fa-chevron-right"></i>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <!--/.Controls-->
                    <?php } ?>
                    <!--Slides-->
                    <div class="carousel-inner" role="listbox">
                        <!--First slide-->
                        <?php
                        $count = 0;
                        $active = 1;

                        foreach ($data["franchises"] as $franchise) {
                            if (count($franchise->games) > 0) {


                                if ($count % 3 == 0) {
                        ?>
                                    <div class="carousel-item 
                        <?php if ($active-- > 0) {
                                        echo 'active';
                                    }
                        ?>
                            ">
                                    <?php
                                } ?>


                                    <div class="col-md-4">
                                        <div class="card mb-2">
                                            <a href="<?= GameHeaven . "browse/franchise=" . $franchise->franchise_id ?>" target="_blank">
                                                <div class="cycle-slideshow" id="slideshow-<?= $franchise->franchise_id ?>" data-cycle-fx="fadeout" data-cycle-manual-fx="scrollHorz" data-cycle-timeout="500">
                                                    <?php
                                                    foreach ($franchise->games as $game) {

                                                    ?>
                                                        <img src="<?= GameHeaven . $game->getImages()[0] ?>">
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </a>
                                            <div class="card-body" style="background-color:black">
                                                <h4 class="card-title text-center" style="color:white; "><?= $franchise->franchise_name ?></h4>

                                                <?php if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $franchise->franchise_publisher_id) {
                                                ?>
                                                    <input type="button" value="Delete" onclick="removeFranchise('<?= $franchise->franchise_id ?>')" style="width: 100%;">

                                                <?php
                                                } ?>

                                            </div>
                                        </div>
                                    </div>



                            <?php
                                $count++;
                                if ($count % 3 == 0 || $count == $numItems) {
                                    echo ("</div>");
                                }
                            }
                        }

                            ?>

                            <!--/.Carousel Wrapper-->
                                    </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <ul class="nav nav-tabs">
                                <?php if ((count($games["publisherGames"]) + count($games["publisherUnverifiedGames"])) > 0) {
                                ?>
                                    <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">All releases</a></li>
                                <?php
                                } ?>
                                <?php if (count($games["publisherTopSellingGames"]) > 0) {
                                ?>
                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Top selling games</a></li>
                                <?php
                                } ?>

                                <?php if (count($games["publisherUpcomingGames"]) > 0) {
                                ?>
                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Upcoming releases</a></li>
                                <?php } ?>

                                <?php if (count($games["publisherDiscountedGames"]) > 0) {
                                ?>
                                    <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Discounts</a></li>
                                <?php }
                                ?>
                            </ul>

                            <!--Section: Block Content-->
                                <div class="tab-content">
                            <?php if (count($games["publisherTopSellingGames"]) > 0) {
                            ?>
                                    <div class="tab-pane" role="tabpanel" id="tab-2">
                                        <?php
                                        foreach ($games["publisherUpcomingGames"] as $game) {
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
                                                                <div class="col-lg-5 col-xl-5">
                                                                    <?php
                                                                    if ($game->game_discount > 0) {
                                                                    ?>
                                                                        <h6 class="mb-3"><span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                                                <i class="fa fa-tag fa-stack-2x"></i>
                                                                                <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                                            </span>
                                                                            <p class="thumb-text"><del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?>USD</del> $<?= $game->getDiscountedPrice() ?>USD</p>
                                                                        </h6>
                                                                    <?php } else {
                                                                    ?>

                                                                        <h6 class="mb-3"><span style="color:red;">$<?= $game->game_price ?> USD</span></h6>
                                                                    <?php } ?>
                                                                    <?php
                                                                    if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {

                                                                    ?>
                                                                        <button class="btn btn-secondary" onclick="window.open('<?= GameHeaven . 'EditGame/' . $game->game_id ?>'),'_blank'">Edit Game</button>
                                                                    <?php }
                                                                    ?>
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

                                <?php if ((count($games["publisherGames"]) + count($games["publisherUnverifiedGames"])) > 0) {
                                ?>

                                    <div class="tab-pane active" role="tabpanel" id="tab-1">
                                        <!--Section: Block Content-->
                                        <section>
                                            <?php
                                            if (count($games["publisherUnverifiedGames"]) > 0 && isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {

                                            ?>
                                                <?php
                                                foreach ($games["publisherUnverifiedGames"] as $game) {
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

                                                                            <h5><?= htmlentities($game->game_name) ?> <?php if ($game->game_verified == 0) {
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
                                                                        <div class="col-lg-5 col-xl-5">
                                                                            <?php
                                                                            if ($game->game_discount > 0) {
                                                                            ?>
                                                                                <h6 class="mb-3"><span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                                                        <i class="fa fa-tag fa-stack-2x"></i>
                                                                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                                                    </span>
                                                                                    <p class="thumb-text"><del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?>USD</del> $<?= $game->getDiscountedPrice() ?>USD</p>
                                                                                </h6>
                                                                            <?php } else {
                                                                            ?>
                                                                                <h6 class="mb-3"><span style="color:red;">$<?= $game->game_price ?> USD</span></h6>
                                                                            <?php }
                                                                            ?>
                                                                            <?php
                                                                            if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {

                                                                            ?>
                                                                                <button class="btn btn-secondary" onclick="window.open('<?= GameHeaven . 'EditGame/' . $game->game_id ?>'),'_blank'">Edit Game</button>
                                                                            <?php }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                            <?php   }
                                            } ?>

                                            <?php if (count($games["publisherGames"]) > 0) {
                                            ?>

                                                <?php
                                                foreach ($games["publisherGames"] as $game) {
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
                                                                        <div class="col-lg-5 col-xl-5">
                                                                            <?php
                                                                            if ($game->game_discount > 0) {
                                                                            ?>
                                                                                <h6 class="mb-3"><span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                                                        <i class="fa fa-tag fa-stack-2x"></i>
                                                                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                                                    </span>
                                                                                    <p class="thumb-text"><del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?>USD</del> $<?= $game->getDiscountedPrice() ?>USD</p>
                                                                                </h6>
                                                                            <?php } else {
                                                                            ?>
                                                                                <h6 class="mb-3"><span style="color:red;">$<?= $game->game_price ?> USD</span></h6>
                                                                            <?php }
                                                                            ?>
                                                                            <?php
                                                                            if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {

                                                                            ?>
                                                                                <button class="btn btn-secondary" onclick="window.open('<?= GameHeaven . 'EditGame/' . $game->game_id ?>'),'_blank'">Edit Game</button>
                                                                            <?php }
                                                                            ?>
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
                                            }
                                        } ?>


                            <?php if (count($games["publisherUpcomingGames"]) > 0) {
                            ?>
                                <div class="tab-pane" role="tabpanel" id="tab-3">
                                    <!--Section: Block Content-->
                                    <section>
                                        <?php
                                        foreach ($games["publisherUpcomingGames"] as $game) {
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
                                                                <div class="col-lg-5 col-xl-5">
                                                                    <?php
                                                                    if ($game->game_discount > 0) {
                                                                    ?>
                                                                        <h6 class="mb-3"><span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                                                <i class="fa fa-tag fa-stack-2x"></i>
                                                                                <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                                            </span>
                                                                            <p class="thumb-text"><del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?>USD</del> $<?= $game->getDiscountedPrice() ?>USD</p>
                                                                        </h6>
                                                                    <?php } else {
                                                                    ?>

                                                                        <h6 class="mb-3"><span style="color:red;">$<?= $game->game_price ?> USD</span></h6>
                                                                    <?php } ?>
                                                                    <?php
                                                                    if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {

                                                                    ?>
                                                                        <button class="btn btn-secondary" onclick="window.open('<?= GameHeaven . 'EditGame/' . $game->game_id ?>'),'_blank'">Edit Game</button>
                                                                    <?php }
                                                                    ?>
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


                            <?php if (count($games["publisherDiscountedGames"]) > 0) {
                            ?>
                                <div class="tab-pane" role="tabpanel" id="tab-4">
                                    <!--Section: Block Content-->
                                    <section>
                                        <?php
                                        foreach ($games["publisherDiscountedGames"] as $game) {
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
                                                                <div class="col-lg-5 col-xl-5">
                                                                    <?php
                                                                    if ($game->game_discount > 0) {
                                                                    ?>
                                                                        <h6 class="mb-3"><span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                                                <i class="fa fa-tag fa-stack-2x"></i>
                                                                                <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                                            </span>
                                                                            <p class="thumb-text"><del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?>USD</del> $<?= $game->getDiscountedPrice() ?>USD</p>
                                                                        </h6>
                                                                    <?php } else {
                                                                    ?>
                                                                        <h6 class="mb-3"><span style="color:red;">$<?= $game->game_price ?> USD</span></h6>
                                                                    <?php } ?>
                                                                    <?php
                                                                    if (isset($_SESSION["publisher"]) && $_SESSION["publisher"]->publisher_id == $data['publisher']->publisher_id) {

                                                                    ?>
                                                                        <button class="btn btn-secondary" onclick="window.open('<?= GameHeaven . 'EditGame/' . $game->game_id ?>'),'_blank'">Edit Game</button>
                                                                    <?php }
                                                                    ?>
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
    </div>
</div>
</div>





<script>
    function removeFranchise(id) {
        document.getElementById("franchise_id").value = id;

        $("#deleteFranchiseModal").modal("show");
    }
</script>
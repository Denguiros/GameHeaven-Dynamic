<?php

$this->_t = "GameHeaven";

?>






<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Product/Product-Details.css">
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Product/Product-Slider-9-1.css">
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Product/Product-Slider-9.css">
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Product/Product-Viewer-1.css">





<video width="100%" preload="auto" autoplay="" loop="" muted="" style="z-index: -1;position: absolute;" poster="<?php echo (GameHeaven); ?>/views/assets/img/poster.jpg">
    <source src="<?php echo (GameHeaven); ?>/views/assets/vids/videobg.mp4" type="video/mp4">
</video>
<h1 class="text-center" id="video-header" style="margin-top: 38vh;color: rgb(255,255,255);margin-bottom: 0;"><br>Released
    on Multiple Platforms - Download Now!<br><br></h1>
<ul class="list-inline" id="downloads">
    <li class="list-inline-item text-center" style="display: table-cell;background-image: url(&quot;<?php echo (GameHeaven); ?>/views/assets/img/background.png&quot;);background-position: center;background-repeat: no-repeat;">
        <a href="#"><img src="<?php echo (GameHeaven); ?>/views/assets/img/ps4.png"></a></li>
    <li class="list-inline-item text-center" style="display: table-cell;background-image: url(&quot;./views/assets/img/background.png&quot;);background-position: center;background-repeat: no-repeat;">
        <a href="#"><img src="<?php echo (GameHeaven); ?>/views/assets/img/android.png"></a></li>
    <li class="list-inline-item text-center" style="display: table-cell;background-image: url(&quot;./views/assets/img/background.png&quot;);background-position: center;background-repeat: no-repeat;">
        <a href="#"><img src="<?php echo (GameHeaven); ?>/views/assets/img/ios.png"></a></li>
    <li class="list-inline-item text-center" style="display: table-cell;background-image: url(&quot;<?php echo (GameHeaven); ?>/views/assets/img/background.png&quot;);background-position: center;background-repeat: no-repeat;">
        <a href="#"><img src="<?php echo (GameHeaven); ?>/views/assets/img/windows.png"></a></li>
</ul>

<section id="carousel" style="background-color: rgba(255,0,0,0);filter: invert(0%);">
    <h1 style="margin-bottom: 0;margin-left: 6vw;color: rgb(255,74,74);font-size: 1.5rem;border-bottom: 0.1rem solid red;display: table;">
        <a href="#" style="color: #f34848;">Featured games</a></h1>
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner" role="listbox">
            <?php
            $active = 1;
            foreach ($games["featuredGames"] as $game) {
            ?>
                <div class="carousel-item 
            <?php if ($active-- > 0) {
                    echo 'active';
                } ?>">
                    <div class="jumbotron pulse animated hero-nature carousel-hero" style="padding: 4.4em 2em;">
                        <a href="game/<?= $game->game_id ?>" style="color: #ffffff;">
                            <div class="wrapper">
                                <div class="container" style="min-width: 80%;">
                                    <div class="row">
                                        <div class="col-md-10 product">
                                            <div class="row fksh" id="<?php $rn = $game->generateRandomNumber(); echo $rn?>">
                                                <div class="col-md-7" style="padding-left: 0;padding-right: 0;">
                                                    <div class="product-image image img-fluid"  style="width: 100%;margin-top: 0;min-height: 20rem;max-height: 100%;height: 100%;">
                                                        <div class="image img-fluid shit" id="<?=$rn?>"  style="background-image: url(<?=GameHeaven.$game->getImages()[0] ?>)"></div>
                                                    </div>
                                                </div>
                                                <div class="text-left col-md-5" style="padding: 0;background-color: #000000;">
                                                    <h1 class="text-left" style="margin-left: 0.2em; color:white;"><?= htmlentities($game->game_name) ?></h1>
                                                    <div class="row product-thumbnails" style="margin: 0;padding: 0;min-width: 50%;">
                                                        <?php
                                                        foreach ($game->getImages() as $image) {
                                                        ?>
                                                            <img class="imgPreview" id="<?=$game->generateRandomNumber()?>" src="<?=GameHeaven.$image ?>">
                                                        <?php } ?>
                                                    </div>
                                                    <h3 class="text-left" style="margin-top: 0.8em;margin-bottom: 0.3em;margin-left: 0.3em;color:white;">
                                                        <?php if($game->isOut()) echo "Purchase now"; else echo "Prepurchase now"; ?></h3>
                                                    <p class="text-left" style="margin-left: 0.3em;margin-bottom: 1.4em;">
                                                        <?php 
                                                        
                                                        foreach (explode(",",$game->game_genres) as $genre) {
                                                            
                                                        ?>
                                                            <span class="badge badge-light" style="background-color: rgb(88,91,94);"><?php echo($genre); ?></span>
                                                        <?php }
                                                        ?>
                                                    </p>
                                                    <?php
                                                    if ($game->game_discount > 0) {
                                                    ?>
                                                        <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                            <i class="fa fa-tag fa-stack-2x"></i>
                                                            <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                        </span>
                                                        <p class="thumb-text">
                                                            <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                                            $<?= $game->getDiscountedPrice() ?>
                                                        </p>
                                                    <?php } else {
                                                    ?>
                                                        <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                                    <?php } ?>
                                                    <p class="text-right" style="margin-bottom: 0.2em;margin-right: 0.3em;">
                                                        <i class="fab fa-windows" style="font-size: 22px;color:white;"></i>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div><a class="carousel-control-prev text-danger" href="#carousel-1" role="button" data-slide="prev" style="font-size: 2em;width: 4em;"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next text-danger" href="#carousel-1" role="button" data-slide="next" style="font-size: 2em;width: 4em;"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators">
            <?php
            $active = 1;
            $i = 0;
            foreach ($games["featuredGames"] as $game) {
            ?>
                <li data-target="#carousel-1" data-slide-to="<?=$i++?>" <?php if ($active-- > 0) {
                                                                    echo 'class="active"';
                                                                } ?>></li>
            <?php } ?>
        </ol>
    </div>
</section>
<h1 style="margin-bottom: 0;margin-left: 6vw;color: rgb(255,74,74);font-size: 1.5rem;border-bottom: 0.1rem solid red;display: table;margin-top: 10vh;">
    <a href="#" style="color: #f34848;">Recommended games</a></h1>
<!--Carousel Wrapper-->
<div id="multi-item-example" class="carousel slide carousel-multi-item " data-ride="carousel" style="padding: 8em;">
    <!--.Controls-->
    <div>
        <a href="#multi-item-example" role="button" data-slide="prev" class="carousel-control-prev text-danger" style="font-size: 2em; width: 4em;">
            <i class="fa fa-chevron-left"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a href="#multi-item-example" role="button" data-slide="next" class="carousel-control-next text-danger" style="font-size: 2em;width: 4em;">
            <i class="fa fa-chevron-right"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--/.Controls-->

    <!--Slides-->
    <div class="carousel-inner" role="listbox">
        <!--First slide-->
        <?php
        $active = 1;
        $count = 0;
        $numItems = count($games["recommendedGames"]);
        foreach ($games["recommendedGames"] as $game) {
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
                <a href="game/<?= $game->game_id ?>">
                    <div class=" col-md-4">
                        <div class="card mb-2">
                            <div class="cycle-slideshow" id="slideshow-<?= $game->game_id ?>" data-cycle-fx="fadeout" data-cycle-manual-fx="scrollHorz" data-cycle-timeout="500">
                                <?php
                                foreach ($game->getImages() as $image) {
                                ?>
                                    <img src="<?= $image ?>">
                                <?php } ?>
                            </div>
                            <div class="card-body" style="background-color:black">
                                <h4 class="card-title" style="color:white;"><?= htmlentities($game->game_name) ?></h4>
                                <p class="card-text text-left" style="margin-left: 0.3em;margin-bottom: 1.4em;">
                                    <?php foreach (explode(",",$game->game_genres) as $genre) {

                                    ?>
                                        <span class="badge badge-light" style="margin-right:0.5em; background-color: rgb(88,91,94);"><?= $genre ?></span>
                                    <?php } 
                                    ?>
                                </p>
                                
                                <?php
                                if ($game->game_discount > 0) {


                                ?>
                                    <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                        <i class="fa fa-tag fa-stack-2x"></i>
                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                    </span>
                                    <p class="thumb-text">
                                        <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                        $<?= $game->getDiscountedPrice() ?>
                                    </p>
                                <?php } else {
                                ?>
                                    <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </a>
            <?php
            $count++;
            if ($count % 3 == 0 || $count == $numItems) {
                echo ("</div>");
            }
        }

            ?>
            <!--/.Second slide-->
                </div>
    </div>
    <!--/.Carousel Wrapper-->

    <div>
        <ul class="nav nav-tabs" style="margin-left: 6vw;">
            <li class="nav-item"><a class="nav-link active" role="tab" data-toggle="tab" href="#tab-1">New Games</a></li>
            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-2">Top selling Games</a></li>
            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-3">Discounted Games</a></li>
            <li class="nav-item"><a class="nav-link" role="tab" data-toggle="tab" href="#tab-4">Upcoming Games</a></li>
        </ul>
        <div class="tab-content" style="padding: 0;padding-top: 1em;margin-left: 5em;">
            <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                <article class="video-sec-wrap">
                    <div class="video-sec">
                        <ul class="video-sec-middle" id="vid-grid">
                            <?php
                            foreach ($games["newGames"] as $game) {
                                $id = $game->generateRandomNumber();
                            ?>
                                <li class="thumb-wrap">
                                    <a href="game/<?= $game->game_id ?>">
                                        <div id="videoHolder<?= $id ?>" style="display: none">
                                            <video id="Video<?= $id ?>" class="newsPic video" src="<?= $game->getVideos()[0] ?>" controls="controls" muted="muted"></video>
                                        </div>
                                        <div id="imgHolder<?= $id ?>" class="imgHolder animated flipInY">
                                            <img class="newsPic" src="<?= $game->getImages()[0] ?>" alt="Avatar">
                                        </div>
                                        <div class="thumb-info">
                                            <p class="thumb-title"><?= htmlentities($game->game_name) ?></p>
                                            <?php foreach (explode(",",$game->game_genres) as $genre) {

?>
    <span class="badge badge-light" style="background-color: rgb(88,91,94);"><?= $genre ?></span>
<?php }
?>
                                            <div>
                                                <?php
                                                if ($game->game_discount > 0) {


                                                ?>
                                                    <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                        <i class="fa fa-tag fa-stack-2x"></i>
                                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                    </span>
                                                    <p class="thumb-text">
                                                        <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                                        $<?= $game->getDiscountedPrice() ?>
                                                    </p>
                                                <?php } else {
                                                ?>
                                                    <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-2">
                 <article class="video-sec-wrap">
                    <div class="video-sec">
                        <ul class="video-sec-middle" id="vid-grid">
                            <?php
                            foreach ($games["topSellingGames"] as $game) {
                                $id = $game->generateRandomNumber();
                            ?>
                                <li class="thumb-wrap">
                                    <a href="game/<?= $game->game_id ?>">
                                        <div id="videoHolder<?= $id ?>" style="display: none">
                                            <video id="Video<?= $id ?>" class="newsPic video" src="<?= $game->getVideos()[0] ?>" controls="controls" muted="muted"></video>
                                        </div>
                                        <div id="imgHolder<?= $id ?>" class="imgHolder animated flipInY">
                                            <img class="newsPic" src="<?= $game->getImages()[0] ?>" alt="Avatar">
                                        </div>
                                        <div class="thumb-info">
                                            <p class="thumb-title"><?= htmlentities($game->game_name) ?></p>
                                            <?php foreach (explode(",",$game->game_genres) as $genre) {

?>
    <span class="badge badge-light" style="background-color: rgb(88,91,94);"><?= $genre ?></span>
<?php }
?>
                                            <div>
                                                <?php
                                                if ($game->game_discount > 0) {


                                                ?>
                                                    <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                        <i class="fa fa-tag fa-stack-2x"></i>
                                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                    </span>
                                                    <p class="thumb-text">
                                                        <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                                        $<?= $game->getDiscountedPrice() ?>
                                                    </p>
                                                <?php } else {
                                                ?>
                                                    <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-3">
                <article class="video-sec-wrap">
                    <div class="video-sec">
                        <ul class="video-sec-middle" id="vid-grid">
                            <?php
                            foreach ($games["discountedGames"] as $game) {
                                $id = $game->generateRandomNumber();
                            ?>
                                <li class="thumb-wrap">
                                    <a href="game/<?= $game->game_id ?>">
                                        <div id="videoHolder<?= $id ?>" style="display: none">
                                            <video id="Video<?= $id ?>" class="newsPic video" src="<?= $game->getVideos()[0] ?>" controls="controls" muted="muted"></video>
                                        </div>
                                        <div id="imgHolder<?= $id ?>" class="imgHolder animated flipInY">
                                            <img class="newsPic" src="<?= $game->getImages()[0] ?>" alt="Avatar">
                                        </div>
                                        <div class="thumb-info">
                                            <p class="thumb-title"><?= htmlentities($game->game_name) ?></p>
                                            <?php foreach (explode(",",$game->game_genres) as $genre) {

?>
    <span class="badge badge-light" style="background-color: rgb(88,91,94);"><?= $genre ?></span>
<?php }
?>
                                            <div>
                                                <?php
                                                if ($game->game_discount > 0) {


                                                ?>
                                                    <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                        <i class="fa fa-tag fa-stack-2x"></i>
                                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                    </span>
                                                    <p class="thumb-text">
                                                        <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                                        $<?= $game->getDiscountedPrice() ?>
                                                    </p>
                                                <?php } else {
                                                ?>
                                                    <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </article>
            </div>
            <div class="tab-pane fade" role="tabpanel" id="tab-4">
                <article class="video-sec-wrap">
                    <div class="video-sec">
                        <ul class="video-sec-middle" id="vid-grid">
                            <?php
                            foreach ($games["upcomingGames"] as $game) {
                                $id = $game->generateRandomNumber();
                            ?>
                                <li class="thumb-wrap">
                                    <a href="game/<?= $game->game_id ?>">
                                        <div id="videoHolder<?= $id ?>" style="display: none">
                                            <video id="Video<?= $id ?>" class="newsPic video" src="<?= $game->getVideos()[0] ?>" controls="controls" muted="muted"></video>
                                        </div>
                                        <div id="imgHolder<?= $id ?>" class="imgHolder animated flipInY">
                                            <img class="newsPic" src="<?= $game->getImages()[0] ?>" alt="Avatar">
                                        </div>
                                        <div class="thumb-info">
                                            <p class="thumb-title"><?= htmlentities($game->game_name) ?></p>
                                            <?php foreach (explode(",",$game->game_genres) as $genre) {

?>
    <span class="badge badge-light" style="background-color: rgb(88,91,94);"><?= $genre ?></span>
<?php }
?>
                                            <div>
                                                <?php
                                                if ($game->game_discount > 0) {


                                                ?>
                                                    <span class="fa-stack fa-lg" style="margin-right:-0.5rem; margin-left:0.4rem;">
                                                        <i class="fa fa-tag fa-stack-2x"></i>
                                                        <i class="fa fa-stack-1x fa-inverse"><?= $game->game_discount ?>%</i>
                                                    </span>
                                                    <p class="thumb-text">
                                                        <del style="color:white;font-size:0.9rem;">$<?= $game->game_price ?></del>
                                                        $<?= $game->getDiscountedPrice() ?>
                                                    </p>
                                                <?php } else {
                                                ?>
                                                    <p class="thumb-text"> $<?= $game->game_price ?> </p>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </article>
            </div>
        </div>
    </div>


    <script src="<?php echo (GameHeaven); ?>/views/assets/js/Product-Viewer-1-1.js"></script>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$this->_t = $data["game"]->game_name . " On GameHeaven";

include 'toastNotifications.php';
?>


<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Application%20Css/Application-Block.css">
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Application%20Css/Application-Main-Carousel.css">
<link rel="stylesheet" href="<?php echo (GameHeaven); ?>/views/assets/css/Application%20Css/Application-MoreLikeThis.css">



<div class="jumbotron pulse animated hero-nature carousel-hero" style="padding: 4.4em 2em;">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 product">
                    <div class="row">
                        <div class="col-md-7" style="padding-left: 0;padding-right: 0;">
                            <div class="product-image image img-fluid" style="width: 100%;margin-top: 0;min-height: 20rem;max-height: 100%;height: 100%;"><video width="560" height="315" style="position: relative;top: 0%;width: 100%;height: 100%;" preload="auto" controls="">
                                    <source src="<?php echo (GameHeaven . $data['game']->getVideos()[0]) ?>" type="video/webm"></video>
                                <div id="image_container" class="image img-fluid" style="background-image:url(<?= GameHeaven . $data["game"]->getImages()[0] ?>)"></div>
                            </div>
                        </div>
                        <div class="col-md-5" style="padding: 0;background-color: #000000;">
                            <h1 class="text-left" style="margin-left: 0.2em;"><?= htmlentities($data["game"]->game_name) ?></h1>
                            <div class="table-responsive" style="font-size: 6px;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="color: rgb(255,255,255);">RELEASE DATE</td>
                                            <td style="color: rgb(255,255,255);"><?= $data["game"]->releaseDate() ?><br></td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(255,255,255);">PUBLISHER:<br></td>
                                            <td style="color: rgb(255,255,255);"><a href="<?= GameHeaven . "Publisher/" . $data["publisher"]->publisher_id ?>" style="color:white"><?= htmlentities($data["publisher"]->publisher_name) ?></a><br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>Popular user-defined tags for this product:<br></p>
                            <p class="text-left" style="margin-left: 0.3em;margin-bottom: 1.4em;">
                                <?php foreach ($data["game"]->game_genres as $gameGenre) {

                                ?>
                                    <a href="<?= GameHeaven ?>browse/<?= $gameGenre ?>=1" style="color:white"><span class="badge badge-light" style="background-color: rgb(88,91,94);margin-right: 10px;"><?= $gameGenre ?></span></a>
                                <?php
                                } ?>
                            </p>
                            <p class="text-right" id="icon" style="margin-bottom: 0.2em;margin-right: 0.3em;">
                                <?php foreach ($data["game"]->game_platforms as $gamePlatform) {

                                ?>
                                    <i class="fab fa-<?= $gamePlatform ?>" style="font-size: 22px;margin-right: 20px;"></i>
                                <?php } ?></p>
                        </div>
                        <div style="width: 100%;background-color: #000000;">
                            <div class="row product-thumbnails" style="float: left;display: inline-block;overflow-x: scroll;overflow-y: hidden;overflow: auto;white-space: nowrap;margin: 0;padding: 0; margin-left: 0px;padding-right: 0;">
                                <div id="video_select" style="display: inline-block;width: auto;" video_link="<?php echo (GameHeaven . $data['game']->getVideos()[0]) ?>"><i class="fa fa-play-circle" style="position: relative;top: 10%;left: 40%;"></i><img src="<?= GameHeaven . $data["game"]->getImages()[0] ?>" style="margin-right: 10px;"></div>
                                <?php
                                $c = 0;
                                foreach ($data["game"]->getImages() as $image) {
                                    if ($c++ == 0) continue
                                ?>
                                    <img id="imageSlide" src="<?= GameHeaven . $image ?>" style="margin-right: 10px;">
                                <?php } ?>
                            </div>
                            <p class="text-left description" id="description"><?= $data["game"]->gameDescriptionPreview() ?>&nbsp;<br></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div>
    <div class="container">
        <div class="row" style="padding: 0px;padding-bottom: 0px;margin: 0px 0px;">
            <div class="col-md-6" id="left_col">
                <?php
                if (!$data["game"]->isOut()) {
                ?>
                    <div style="width: 100%;height: 209px;">
                        <div class="container" style="width: 100%;padding-right: 0px;">
                            <div class="row" style="width: 100%;margin: 0px 0px;padding: 0px;padding-top: 0px;height: 183px;">
                                <div class="col-sm-8 col-md-12 col-lg-10 col-xl-12 offset-sm-2 offset-md-0 offset-lg-1 offset-xl-0" style="padding-left: 0px;padding-right: 0px;/*margin-left: 0px;*/width: 100%;max-width: 100%;">
                                    <div class="card" style="background-color: rgb(174,16,16);width: 100%;">
                                        <div class="card-content" style="/*color: rgb(255,255,255);*//*padding-left: 16px;*/width: auto;">
                                            <h3 style="white-space: nowrap;color: rgb(255,255,255);"><br>Coming <?= $data["game"]->releaseDate() ?><br></h3>
                                        </div>
                                        <div class="card-content" style="color: rgb(255,255,255);">
                                            <p><?= $data["game"]->timeRemaining(); ?><br></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-8 col-md-12 col-lg-10 col-xl-12 offset-sm-2 offset-md-0 offset-lg-1 offset-xl-0" style="padding-right: 0px;padding-left: 0px;">
                                    <div class="card" style="background-color: rgb(174,16,16);">
                                        <div class="card-header" style="color: rgb(255,255,255);padding-left: 17px;padding-right: 34px;">
                                            <h3 style="color: rgb(255,255,255);"><br>Pre-Purchase <?= htmlentities($data["game"]->game_name) ?><br></h3>
                                        </div>
                                        <div class="card-content" style="align-self: flex-end;color: rgb(255,255,255);">
                                            <?php if (isset($user)) {

                                                if ($user->ownsGame($data["game"]->game_id)) {
                                            ?>
                                                    <p style="align-self:flex-start !important">You own this game. Wait for its release to play it..</p>
                                                <?php
                                                } else {
                                                ?>

                                                    <input type="hidden" id="game_id" value="<?= htmlentities($data["game"]->game_id) ?>">
                                                    <button class="button" type="submit" data-hover="<?= $data["game"]->getDiscountedPrice() ?>$" name="addToCart" onclick="addToCart()" ;>
                                                        <span>ADD TO CART?</span>
                                                    </button>


                                                <?php
                                                }
                                            } else {
                                                ?>
                                                <button class="button" onclick="notLoggedInAddToCart()" data-hover="<?= $data["game"]->getDiscountedPrice() ?>$"><span>ADD TO CART?</span></button>
                                            <?php
                                            }
                                            ?>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else {
                ?>
                    <div style="margin-top:-10px;">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-8 col-md-12 col-lg-10 col-xl-12 offset-sm-2 offset-md-0 offset-lg-1 offset-xl-0" style="padding-right: 0px;padding-left: 0px;">
                                    <div class="card" style="background-color: rgb(174,16,16);">
                                        <div class="card-header" style="color: rgb(255,255,255);padding-left: 17px;padding-right: 34px;">
                                            <h3 style="color: rgb(255,255,255);"><br>Purchase <?= htmlentities($data["game"]->game_name) ?><br></h3>
                                        </div>
                                        <div class="card-content" style="align-self: flex-end;color: rgb(255,255,255);">
                                            <?php if (isset($user)) {
                                                if ($user->ownsGame($data["game"]->game_id)) {
                                            ?>
                                                    <button class="button">
                                                        Play in GameHeaven
                                                    </button>
                                                <?php
                                                } else {
                                                ?>
                                                    <input type="hidden" id="game_id" value="<?= htmlentities($data["game"]->game_id) ?>">
                                                    <button class="button" type="submit" data-hover="<?= $data["game"]->getDiscountedPrice() ?>$" name="addToCart" onclick="addToCart()">
                                                        <span>ADD TO CART?</span>
                                                    </button>


                                                <?php }
                                            } else {
                                                ?>
                                                <button class="button" onclick="notLoggedInAddToCart()" data-hover="<?= $data["game"]->getDiscountedPrice() ?>$"><span>ADD TO CART?</span></button>
                                            <?php
                                            }
                                            ?>




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <div id="about_game" style="padding-top: 20px;color:white">
                    <p style="color: rgb(255,255,255);font-size: 19px;">ABOUT THIS GAME<br></p>
                    <hr style="border: 0px;height: 1px;background-image: linear-gradient(to right, #2b658f, rgb(43,101,143), rgba(30,30,30,0));">
                    <p style="color: rgb(255,255,255);font-size: 12px;"><?php echo (htmlspecialchars_decode($data["game"]->game_description)) ?></p>
                </div>
                <?php
                if ($data["pegi_rating"]->rating_age >= 16) {

                ?>
                    <div id="mature_content" style="padding-top: 20px;">
                        <p style="color: rgb(255,255,255);font-size: 19px;">MATURE CONTENT DESCRIPTION<br></p>
                        <hr style="border: 0px;height: 1px;background-image: linear-gradient(to right, #2b658f, rgb(43,101,143), rgba(30,30,30,0));">
                        <p style="color: rgb(255,255,255);font-size: 12px;"><br>The developers describe the content like this:<em>This Game may contain content not appropriate for all ages, or may not be appropriate for viewing at work: Nudity or Sexual Content, General Mature Content</em><br><br></p>
                    </div>
                <?php }
            
                ?>
                    

                <div id="system_req">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-dark">
                            
                            <caption style="color:white;margin-top:25px;"><?= htmlentities($data["publisher"]->publisher_name) ?>®, <?= htmlentities($data["game"]->game_name) ?>® are registered trademarks of <?= htmlentities($data["publisher"]->publisher_name) ?>. All rights reserved. All other copyrights and trademarks are the property of their respective owners.<br></caption>
                            <?php 
                if(in_array("windows",$data["game"]->game_platforms))
                {

                
                ?>
                            <thead>
                                <tr>
                                    <th style="color: rgb(255,255,255);">MINIMUM:<br></th>
                                    <th style="color: rgb(255,255,255);">RECOMMENDED :<br></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="color: rgb(255,255,255);">OS:&nbsp;<?= $data["game"]->game_min_os ?><br></td>
                                    <td style="color: rgb(255,255,255);">OS:&nbsp;<?= $data["game"]->game_recommended_os ?><br></td>
                                </tr>
                                <tr>
                                    <td style="color: rgb(255,255,255);">Processor:&nbsp;<?= $data["game"]->game_min_processor ?><br></td>
                                    <td style="color: rgb(255,255,255);">Processor:&nbsp;<?= $data["game"]->game_recommended_processor ?><br></td>
                                </tr>
                                <tr>
                                    <td style="color: rgb(255,255,255);">Memory:&nbsp;<?= $data["game"]->game_min_memory ?><br></td>
                                    <td style="color: rgb(255,255,255);">Memory:&nbsp;<?= $data["game"]->game_recommended_memory ?><br></td>
                                </tr>
                                <tr>
                                    <td style="color: rgb(255,255,255);">Graphics:&nbsp;<?= $data["game"]->game_min_graphics ?><br></td>
                                    <td style="color: rgb(255,255,255);">Graphics:&nbsp;<?= $data["game"]->game_recommended_graphics ?><br></td>
                                </tr>
                                <tr>
                                    <td style="color: rgb(255,255,255);">DirectX:&nbsp;<?= $data["game"]->game_min_directx ?><br></td>
                                    <td style="color: rgb(255,255,255);">DirectX:&nbsp;<?= $data["game"]->game_recommended_directx ?><br></td>
                                </tr>
                                <tr>
                                    <td style="color: rgb(255,255,255);">Storage:&nbsp;<?= $data["game"]->game_min_storage ?> GB<br></td>
                                    <td style="color: rgb(255,255,255);">Storage:&nbsp;<?= $data["game"]->game_recommended_storage ?> GB<br></td>
                                </tr>
                                <tr>
                                    <td style="color: rgb(255,255,255);">Additional Notes:&nbsp;<?= $data["game"]->game_additional_notes ?><br></td>
                                    <td></td>
                                </tr>
                            </tbody>
                            <?php }?>
                        </table>

                    </div>
                </div>
            </div>

            <div class="col-md-6 col-xl-6 offset-md-0" id="right_col">
                <div id="rating_card" style="width: 100%;height: 209px;color: rgb(255,255,255)">
                    <div class="container" style="width: 100%;padding-right: 0px;">
                        <div class="row" style="width: 100%;margin: 0px 0px;padding: 0px;padding-top: 0px;height: auto;">
                            <div class="col-12 col-sm-8 col-md-12 col-lg-9 col-xl-9 offset-sm-2 offset-md-0 offset-xl-2" style="padding-left: 0px;padding-right: 0px;width: auto;max-width: 100%;height: auto;">
                                <div class="card" style="display: block;background-color: rgb(174,16,16);width: auto;height: auto;min-height: 0px;">
                                    <div><img src="<?php echo (GameHeaven); ?>/views/assets/img/pegi<?= $data["pegi_rating"]->rating_age ?>.jpg" style="float: left;display: inline-block;width: 60px;height: auto;margin: 39px;"></div>
                                    <div>
                                        <p style="width: auto;">
                                            <?php foreach (explode("/", $data["pegi_rating"]->rating_description) as $desc) {
                                                echo ($desc . '<br>');
                                            }
                                            ?><br></p>
                                    </div>
                                    <p class="text-nowrap text-left d-xl-flex justify-content-xl-start align-items-xl-end">Rating for: PEGI<br></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="infos" style="width: 100%;height: auto;color: rgb(255,255,255);margin-top: 50px;">
                    <div class="container" style="width: 100%;padding-right: 0px;">
                        <div class="row" style="width: 100%;margin: 0px 0px;padding: 0px;padding-top: 0px;height: auto;">
                            <div class="col-sm-8 col-md-8 col-xl-9 offset-sm-2 offset-md-0 offset-xl-2" style="padding-left: 0px;padding-right: 0px;/*margin-left: 0px;*/width: auto;max-width: 100%;height: auto;">
                                <div class="card" style="display: block;background-color: rgba(43,101,143,0);width: auto;height: auto;min-height: 0px;">
                                    <div class="table-responsive" id="infos_table">
                                        <table class="table table-striped table-hover table-dark">
                                            <tbody>
                                                <tr>
                                                    <td style="color: rgb(255,255,255);">TITLE :<br></td>
                                                    <td style="color: rgb(255,255,255);"><?= $data["game"]->game_name ?><br></td>
                                                </tr>
                                                <tr>
                                                    <td style="color: rgb(255,255,255);">GENRE :<br></td>
                                                    <td style="color: rgb(255,255,255);"><a href="<?= GameHeaven ?>browse/<?= $data["game"]->game_genres[0] ?>=1" style="color:white"> <?= $data["game"]->game_genres[0] ?><br></a></td>
                                                </tr>
                                                <tr>
                                                    <td style="color: rgb(255,255,255);">PUBLISHER :<br></td>
                                                    <td style="color: rgb(255,255,255);"><a href="<?= GameHeaven . "Publisher/" . $data["publisher"]->publisher_id ?>" style="color:white"><?= $data["publisher"]->publisher_name ?></a><br></td>
                                                </tr>
                                                <tr>
                                                    <td style="color: rgb(255,255,255);">RELEASE DATE :<br></td>
                                                    <td style="color: rgb(255,255,255);"><?= $data["game"]->releaseDate() ?><br></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div>
                                        <?php if ($data["game"]->game_website_link) {
                                        ?>
                                            <button class="btn btn-primary" type="button" style="width: 100%;background-color: rgb(53,60,67);" onclick="window.open('<?= $data['game']->game_website_link ?>','_blank')">VISIT <?= $data["game"]->game_name ?>'S WEBSITE<i class="fa fa-check" style="float: right;"></i></button>
                                        <?php }
                                        ?>
                                        <?php if ($data["game"]->game_facebook_link) {
                                        ?>
                                            <button class="btn btn-primary" type="button" style="width: 100%;background-color: rgb(53,60,67);padding-right: 20px;font-size: 14px;" onclick="window.open('<?= $data['game']->game_facebook_link ?>','_blank')"><?= $data["game"]->game_name ?> on Facebook&nbsp;<i class="fab fa-facebook-square" style="float: right;"></i></button>
                                        <?php }
                                        ?>
                                        <?php if ($data["game"]->game_twitch_link) {
                                        ?>
                                            <button class="btn btn-primary" type="button" style="width: 100%;background-color: rgb(53,60,67);padding-right: 20px;font-size: 14px;" onclick="window.open('<?= $data['game']->game_twitch_link ?>','_blank')"><?= $data["game"]->game_name ?> on Twitch&nbsp;<i class="fab fa-twitch" style="float: right;"></i></button>
                                        <?php }
                                        ?>
                                        <?php if ($data["game"]->game_twitter_link) {
                                        ?>
                                            <button class="btn btn-primary" type="button" style="width: 100%;background-color: rgb(53,60,67);padding-right: 20px;font-size: 14px;" onclick="window.open('<?= $data['game']->game_twitter_link ?>','_blank')"><?= $data["game"]->game_name ?> on Twitter<i class="fab fa-twitter" style="float: right;"></i></button>
                                        <?php }
                                        ?>
                                        <?php if ($data["game"]->game_youtube_link) {
                                        ?>
                                            <button class="btn btn-primary" type="button" style="width: 100%;background-color: rgb(53,60,67);padding-right: 20px;font-size: 14px;" onclick="window.open('<?= $data['game']->game_youtube_link ?>','_blank')"><?= $data["game"]->game_name ?> on YouTube<i class="fab fa-youtube" style="float: right;"></i></button>
                                        <?php }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="share_report" style="width: 100%;height: 209px;color: rgb(255,255,255);margin-top: 50px;">
                    <div class="container" style="width: 100%;padding-right: 0px;">
                        <div class="row" style="width: 100%;margin: 0px 0px;padding: 0px;padding-top: 0px;height: auto;">
                            <div class="col-12 col-sm-8 col-md-12 col-lg-9 col-xl-9 offset-sm-2 offset-md-0 offset-xl-2" style="padding-left: 0px;padding-right: 0px;/*margin-left: 0px;*/width: auto;max-width: 100%;height: auto;">
                                <div class="card" style="display: block;background-color: rgb(174,16,16);width: auto;height: auto;min-height: 0px;">

                                    <?php
                                    if (isset($_SESSION['user'])) {
                                    ?>
                                        <button class="btn btn-primary" type="button" style="width: 40%;" onclick="copyToClipboard()">Share<i class="fa fa-share" style="float: right;"></i></button>
                                        <button class="btn btn-primary" type="button" style="float: right;width: 40%;" data-toggle="modal" data-target="#modalPoll-1">Report<i class="fa fa-flag" style="float: right;"></i></button></div>
                            <?php
                                    } else {
                            ?>
                                <button class="btn btn-primary btn-block" type="button"  onclick="copyToClipboard()">Share<i class="fa fa-share" style="float: right;"></i></button>

                            <?php
                                    }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (count($data["similar_games"]) > 0) { ?>
    <div class="col" style="margin-bottom: 20rem;">
        <div id="more_like_this">
            <p class="text-left" style="color: rgb(255,255,255);font-size: 19px;">MORE LIKE THIS<br></p>
            <hr style="border: 0px;height: 1px;background-image: linear-gradient(to right, #2b658f, rgb(43,101,143), rgba(30,30,30,0));">
            <div class="row product-thumbnails" style="float: left;display: inline-block;overflow-x: scroll;overflow-y: hidden;overflow: auto;white-space: nowrap;margin: 0;padding: 0;width: 100%;margin-left: 0px;padding-right: 0;/*margin-right: 30px;*/">
                <?php
                foreach ($data["similar_games"] as $game) {
                ?>
                    <a href="<?= $game->game_id ?>">
                        <div class="card border-white border rounded shadow-lg" data-bs-hover-animate="pulse" style="display: inline-block;width: 230px;height: auto;margin: 10px;margin-left: 15px;background-color: rgb(58,65,73);">
                            <div class="card-body" style="width: auto;height: auto;padding: 0px;margin: 10px;"><img class="d-lg-flex m-auto align-items-lg-center" style="width: 205px;height: 115.31px;margin-left: 0px;padding-left: 0px;" src="<?= GameHeaven . htmlentities($game->getImages()[0]) ?>">
                                <h4 class="card-title" title="<?= htmlentities($game->game_name) ?>" style="margin-top: 5px;color: rgb(255,255,255);white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= htmlentities($game->game_name) ?></h4>
                                <h6 class="text-muted card-subtitle mb-2" style="margin-top: 0px;"><?= $game->getDiscountedPrice() ?>$</h6>
                            </div>
                        </div>
                    <?php
                }
                    ?>
            </div>
        </div>
    </div>
<?php }
?>
<input type="hidden" id="item-to-copy" value="<?=GameHeaven?>game/<?=$data['game']->game_id?>">
<script src="<?php echo (GameHeaven); ?>/views/assets/js/Application-main/Product-Viewer-1-1.js"></script>
<script src="<?= GameHeaven ?>views/assets/ajax/ajax.js"></script>
<script>
function copyToClipboard() {
    const str = document.getElementById('item-to-copy').value;
    const el = document.createElement('textarea');
    el.value = str;
    el.setAttribute('readonly', '');
    el.style.position = 'absolute';
    el.style.left = '-9999px';
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
}
</script>
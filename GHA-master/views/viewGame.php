<?php

$this->_t = $data["game"]->game_name . " On GameHeaven";
?>



<link rel="stylesheet" href="<?php echo (AdminPanel); ?>/views/assets/css/Application%20Css/Application-Block.css">
<link rel="stylesheet" href="<?php echo (AdminPanel); ?>/views/assets/css/Application%20Css/Application-Main-Carousel.css">
<link rel="stylesheet" href="<?php echo (AdminPanel); ?>/views/assets/css/Application%20Css/Application-MoreLikeThis.css">

<?php 
$vid = glob("../GH/" .$data["game"]->getDir()."/videos/*.*");

$imgs = glob(("../GH/" .$data["game"]->getDir()."/images/*.*"));
$vid = AdminPanel.$vid[0];
?>


<div style="align-items: center;position: relative; left:40%; display: block;">

<a class="btn btn-primary" href="<?=AdminPanel ?>Games/All Games" style="margin:0;">Return to games</a>
<?php 
if($data["game"]->game_verified){
    ?>
    
    <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" value="<?=$data["game"]->game_id?>" name="gid">
    <input type="submit" class="btn btn-primary" name="dissaproveGame" value="Dissaprove Game" style="margin:0;">
    </form>
    <?php
}else{
    ?>
    <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" value="<?=$data["game"]->game_id?>" name="gid">
    <input type="submit" class="btn btn-primary" name="approveGame" value="Approve Game" style="margin:0;">
</form>
    <?php 
}
?>



</div>


<div class="jumbotron pulse animated hero-nature carousel-hero" style="padding: 4.4em 2em;">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-10 product">
                    <div class="row">
                        <div class="col-md-7" style="padding-left: 0;padding-right: 0;">
                            <div class="product-image image img-fluid" style="width: 100%;margin-top: 0;min-height: 20rem;max-height: 100%;height: 100%;"><video width="560" height="315" style="position: relative;top: 0%;width: 100%;height: 100%;" preload="auto" controls="">
                                    <source src="<?php echo ($vid); ?>" type="video/webm"></video>
                                <div id="image_container" class="image img-fluid" style="background-image:url(<?= AdminPanel."../GH/" . $data["game"]->getImages()[0] ?>)"></div>
                            </div>
                        </div>
                        <div class="col-md-5" style="padding: 0;background-color: #000000;">
                            <h1 class="text-left" style="margin-left: 0.2em;"><?= htmlentities($data["game"]->game_name) ?></h1>
                            <div class="table-responsive" style="font-size: 16px;">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="color: rgb(255,255,255);">RELEASE DATE</td>
                                            <td style="color: rgb(255,255,255);"><?= $data["game"]->releaseDate() ?><br></td>
                                        </tr>
                                        <tr>
                                            <td style="color: rgb(255,255,255);">PUBLISHER:<br></td>
                                            <td style="color: rgb(255,255,255);"><a href="<?= AdminPanel."../GH/" . "Publisher/" . $data["publisher"]->publisher_id ?>" style="color:white"><?= htmlentities($data["publisher"]->publisher_name) ?></a><br></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>Popular user-defined tags for this product:<br></p>
                            <p class="text-left" style="margin-left: 0.3em;margin-bottom: 1.4em;">
                                <?php foreach ($data["game"]->game_genres as $gameGenre) {

                                ?>
                                    <a href="#" style="color:white"><span class="badge" style="background-color: rgb(88,91,94);margin-right: 10px;"><?= $gameGenre ?></span></a>
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
                                <div id="video_select" style="display: inline-block;width: auto;" video_link="<?php echo (AdminPanel."../GH/" . $data['game']->getVideos()[0]) ?>"><i class="fa fa-play-circle" style="position: relative;top: 10%;left: 40%;"></i><img src="<?= AdminPanel.$imgs[0] ?>" style="margin-right: 10px;"></div>
                                <?php
                                $c = 0;
                                foreach ($imgs as $image) {
                                    if ($c++ == 0) continue
                                ?>
                                    <img id="imageSlide" src="<?= AdminPanel. $image ?>" style="margin-right: 10px;">
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


<div class="alert alert-primary" role="alert" style="text-align: center; width: 40%; left:30%;">
<h3>PEGI RATING : <?=$data["pegi_rating"]->rating_age?></h3>
<div><img src="<?php echo (AdminPanel); ?>../GH/views/assets/img/pegi<?= $data["pegi_rating"]->rating_age ?>.jpg" style="float: left;display: inline-block;width: 60px;height: auto;margin: 39px;"></div>
<div>
<p style="width: auto;">
    <?php foreach (explode("/", $data["pegi_rating"]->rating_description) as $desc) {
        echo ($desc . '<br>');
    }
    ?><br></p>
</div>

</div>




<div class="alert alert-primary" role="alert" style="text-align: center;width: 40%; left:30%;">
<h3 style="white-space: nowrap;color: black;"><br>Release date <?= $data["game"]->releaseDate() ?><br></h3>
<h3>Price : <?=$data["game"]->getDiscountedPrice(); ?> $</h3>
</div>

<div  style="padding-top: 20px;color:black;background-color: black; font-weight: bold;">
                    <p style="color: white;font-size: 19px;">ABOUT THIS GAME<br></p>
                    <hr style="border: 0px;height: 1px;background-image: linear-gradient(to right, #2b658f, rgb(43,101,143), rgba(30,30,30,0));">
                    <p style="color: white;font-size: 15px;"><?php echo (htmlspecialchars_decode($data["game"]->game_description)) ?></p>
</div>


<?php 
                if(in_array("windows",$data["game"]->game_platforms))
                {

                
                ?>

<p style="color: black;font-size: 19px;font-weight: bold;">SYSTEM REQUIREMENTS<br></p>


<div id="system_req">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-dark">
                            
                            <caption style="color:white;margin-top:25px;"><?= htmlentities($data["publisher"]->publisher_name) ?>®, <?= htmlentities($data["game"]->game_name) ?>® are registered trademarks of <?= htmlentities($data["publisher"]->publisher_name) ?>. All rights reserved. All other copyrights and trademarks are the property of their respective owners.<br></caption>
                       
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








<script src="<?php echo (AdminPanel); ?>/views/assets/js/Application-main/Product-Viewer-1-1.js"></script>
<script src="<?= AdminPanel ?>views/assets/js/ajax/ajax.js"></script>


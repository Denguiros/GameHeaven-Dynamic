
<?php
$this->_t = "RetroHeaven";
?>

<style>
    @font-face {
        font-family: font1;
        src: url('<?=GameHeaven ?>/views/assets/retroheaven/fonts/retroFunk.otf');
    }

    @font-face {
        font-family: font2;
        src: url('<?=GameHeaven ?>/views/assets/retroheaven/fonts/victim.TTF');
    }
    
</style>

<?php 
$f = rand(1,2);
?>

<img src="<?=GameHeaven ?>views/assets/retroheaven/background.gif" width="100%" style="z-index: -1;position:absolute">

<h1 class="text-center" id="video-header" style="margin-top: 38vh;color: rgb(255,255,255);margin-bottom: 0; font-family: font<?=$f ?>;"><br>Retro Heaven, All your retro games online !<br><br></h1>
<ul class="list-inline" id="downloads">
    
    <li class="list-inline-item text-center" style="display: table-cell;background-image: url(&quot;<?php echo (GameHeaven); ?>/views/assets/img/background.png&quot;);background-position: center;background-repeat: no-repeat;">
    <a href="#"><img src="<?php echo (GameHeaven); ?>/views/assets/retroheaven/imgs/snes.png" width="180px;"></a></li>
    
    <li class="list-inline-item text-center" style="display: table-cell;background-image: url(&quot;./views/assets/img/background.png&quot;);background-position: center;background-repeat: no-repeat;">
    <a href="#"><img src="<?php echo (GameHeaven); ?>/views/assets/retroheaven/imgs/sega.png" width="180px;"></a></li>
  
</ul>

<div class="d-flex flex-wrap">
<?php if(isset($games)){

    foreach($games as $g){

        ?>
        
        <div class="card" style="width: 18rem; margin-right: 40px; margin-left:20px;">
  <img class="card-img-top" src="<?=GameHeaven ?>retrogames/<?=$g->game_id?>/poster.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?=$g->game_name ?></h5>
    <p class="card-text"><?=$g->game_description ?></p>
    <a href="<?=GameHeaven?>RetroGame/<?=$g->game_id ?>" class="btn btn-primary">Play Game</a>
  </div>
    </div>
        
        
        <?php
    }



} ?>


</div>
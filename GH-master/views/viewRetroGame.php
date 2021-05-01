<?php 

$this->_t = $game->game_name;

?>

<h1 class="text-center" style="font-weight: bold ;color: rgb(255,255,255);margin-bottom: 0;"><br>Playing <?=$game->game_name ?> on RetroHeaven<br><br></h1>

<div class="emulator" align="center">
	<div id="emulator">
		<p>To play this game, please, download the latest Flash player!</p>
		<br>
		<a href="http://www.adobe.com/go/getflashplayer">
			<img src="//www.adobe.com/images/shared/download_buttons/get_adobe_flash_player.png" alt="Get Adobe Flash player"/>
		</a>
	</div>
</div>
<div align="center">
<h1 class="text-center" id="video-header" style="margin-top: 5vh;color: rgb(255,255,255);margin-bottom: 0;">Controls
</h1>

<img src="<?=GameHeaven ?>views/assets/retroheaven/imgs/controls.png">
</div>
<script src="<?=GameHeaven ?>views/assets/retroheaven/jquery.min.js"></script>
<script src="<?=GameHeaven ?>views/assets/retroheaven/swfobject.js"></script>


<script type="text/javascript">

	var resizeOwnEmulator = function(width, height)
	{
		var emulator = $('#emulator');
		emulator.css('width', width);
		emulator.css('height', height);
	}

	$(function()
	{
		function embed()
		{
			var emulator = $('#emulator');
			if(emulator)
			{
				var flashvars = 
				{
					system : 'SNES',
					url : '<?=GameHeaven ?>/retrogames/<?=$game->game_id?>/<?=$game->game_file_name ?>'
				};
				var params = {};
				var attributes = {};
				
				params.allowscriptaccess = 'sameDomain';
				params.allowFullScreen = 'true';
				params.allowFullScreenInteractive = 'true';
				
				swfobject.embedSWF('<?=GameHeaven ?>views/assets/retroheaven/emulator-master/bin/Nesbox.swf', 'emulator', '640', '480', '11.2.0', 'flash/expressInstall.swf', flashvars, params, attributes);
			}
		}
		
		embed();
	});
	
</script>
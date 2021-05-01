var videoHolder;
var picHolder;
var video;
var timer;
$("document").ready(function()
{
    videoHolder=$('#videoHolder2');
    $('.imgHolder').on('mouseover',function() {
            picHolder=$('#'+this.id);
            videoHolder=$('#videoHolder'+this.id.slice(9));
            video=$("#Video"+this.id.slice(9));
            playVideo();
            videoHolder.on('mouseout',pauseVideo);
     });
});

function playVideo()
{
    picHolder.hide();
    videoHolder.show();
    video.get(0).play();
	
}
function pauseVideo()
{
    video.get(0).currentTime=0;
    video.get(0).pause();
    videoHolder.hide();
    picHolder.show();
}
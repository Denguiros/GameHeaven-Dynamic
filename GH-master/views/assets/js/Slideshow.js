var slide="";

$('document').ready(function()
{
    reinitialize();
});

function reinitialize()
{
    $('.cycle-slideshow').cycle();
    $('.cycle-slideshow').cycle('pause');
    $('.cycle-slideshow').hover(function() {
            slide=$('#'+this.id+'');
            play();
     },reinit);
}
function reinit()
    {
        slide.cycle('goto',0);
        slide.cycle('pause');
    };
function play(){
        slide.cycle('goto',1);
        slide.cycle('resume');
    };
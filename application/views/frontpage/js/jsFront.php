<!-- revoluation -->
<script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/revolution/rs-plugin/js/jquery.themepunch.tools.min.js"></script>   
<script type="text/javascript" src="<?php echo $this->common->theme_custome(); ?>js/revolution/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

<script type="text/javascript">
jQuery(document).ready(function() {
  jQuery('.tp-banner').show().revolution(
  {
    dottedOverlay:"none",
    delay:9000,
    startwidth:1270,
    startheight:750,
    hideThumbs:200,
    thumbWidth:100,
    thumbHeight:50,
    thumbAmount:5,
    navigationType:"off",
    navigationArrows:"on",
    navigationStyle:"on",
    touchenabled:"on",
    onHoverStop:"on",
    swipe_velocity: 0.7,
    swipe_min_touches: 1,
    swipe_max_touches: 1,
    drag_block_vertical: false,
    parallax:"mouse",
    parallaxBgFreeze:"on",
    parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
    keyboardNavigation:"on",
    navigationHAlign:"center",
    navigationVAlign:"bottom",
    navigationHOffset:0,
    navigationVOffset:20,
    soloArrowLeftHalign:"left",
    soloArrowLeftValign:"center",
    soloArrowLeftHOffset:20,
    soloArrowLeftVOffset:0,
    soloArrowRightHalign:"right",
    soloArrowRightValign:"center",
    soloArrowRightHOffset:20,
    soloArrowRightVOffset:0,
    shadow:0,
    fullWidth:"off",
    fullScreen:"off",
    spinner:"spinner4",
    stopLoop:"on",
    stopAfterLoops:-1,
    stopAtSlide:-1,
    shuffle:"off",
    autoHeight:"off",           
    forceFullWidth:"off",          
    hideThumbsOnMobile:"off",
    hideNavDelayOnMobile:1500,            
    hideBulletsOnMobile:"off",
    hideArrowsOnMobile:"off",
    hideThumbsUnderResolution:0,
    hideSliderAtLimit:0,
    hideCaptionAtLimit:0,
    hideAllCaptionAtLilmit:0,
    startWithSlide:0,
    fullScreenOffsetContainer: ".header"  
  });





});  
</script>
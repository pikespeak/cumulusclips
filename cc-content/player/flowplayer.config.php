<?php

### Created on January 7, 2011
### Created by Miguel A. Hurtado
### This script supplies the Flowplayer configuration for externally embedded videos


// Include required files
include ('../../cc-core/config/bootstrap.php');
App::LoadClass ('Video.php');


if (empty ($_GET['video'])) App::Throw404 ();

$filename = trim ($_GET['video']);
$id = Video::Exist (array ('filename' => $filename));
if ($id) {
    $video = new Video ($id);
} else {
    App::Throw404();
}

?>{
    "canvas":{"backgroundColor":"#000000"},
    "plugins":{
        "controls":{
            "url":"<?=HOST?>/cc-content/player/flowplayer.controls-3.2.3.swf",
            "borderRadius":"0px",
            "timeColor":"#ffffff",
            "slowForward":true,
            "bufferGradient":"none",
            "backgroundColor":"rgba(0, 0, 0, 1)",
            "volumeSliderGradient":"none",
            "slowBackward":false,
            "timeBorderRadius":20,
            "progressGradient":"none",
            "time":true,
            "height":23,
            "volumeColor":"rgba(51, 204, 255, 1)",
            "tooltips":{
                "marginBottom":5,
                "volume":true,
                "scrubber":true,
                "buttons":false
            },
            "fastBackward":false,
            "opacity":1,
            "timeFontSize":11,
            "border":"0px",
            "volumeSliderColor":"#ffffff",
            "bufferColor":"#a3a3a3",
            "buttonColor":"#ffffff",
            "mute":true,
            "autoHide":{
                "enabled":true,
                "hideDelay":500,
                "mouseOutDelay":500,
                "hideStyle":"fade",
                "hideDuration":400,
                "fullscreenOnly":true
            },
            "backgroundGradient":[0.5,0.4,0.3,0.2,0,0,0,0],
            "width":"100pct",
            "display":"block",
            "sliderBorder":"1px solid rgba(128, 128, 128, 0.7)",
            "buttonOverColor":"#ffffff",
            "fullscreen":true,
            "timeBgColor":"rgb(0, 0, 0, 0)",
            "scrubberBarHeightRatio":0.2,
            "bottom":0,
            "stop":false,
            "zIndex":1,
            "sliderColor":"#000000",
            "scrubberHeightRatio":0.6,
            "tooltipTextColor":"#ffffff",
            "spacing":{
                "time":6,
                "volume":8,
                "all":2
            },
            "sliderGradient":"none",
            "timeBgHeightRatio":0.8,
            "volumeSliderHeightRatio":0.6,
            "name":"controls",
            "timeSeparator":" ",
            "volumeBarHeightRatio":0.2,
            "left":"50pct",
            "tooltipColor":"rgba(0, 0, 0, 0)",
            "playlist":false,
            "durationColor":"rgba(51, 204, 255, 1)",
            "play":true,
            "fastForward":true,
            "progressColor":"rgba(51, 204, 255, 1)",
            "timeBorder":"0px solid rgba(0, 0, 0, 0.3)",
            "volume":true,
            "scrubber":true,
            "builtIn":false,
            "volumeBorder":"1px solid rgba(128, 128, 128, 0.7)",
            "margins":[2,6,2,12]
        }
    },
    "clip":{
        "url":"<?=$config->flv_bucket_url?>/<?=$video->filename?>.flv",
        "linkUrl":"<?=HOST?>/videos/<?=$video->video_id?>/<?=$video->slug?>/",
        "autoPlay":false
    }
}
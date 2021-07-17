<?php
    $test = file_get_contents($Ep['Link']);

    echo $test;
?>
<script>
    $('.vjs-menu-content > li')[3].click();
    $('.vjs-menu-content > li')[2].click();
    $('.middle > button')[0].click();

    setTimeout(function() {
    var link = $('video')[0].src; 
    $('<input id="link" type="hidden">').val(link).appendTo('body'); 
    $('.plyr__video-wrapper > #player > source')[0].setAttribute("src", link)
    $('.middle > button')[0].click();
    $('#deleteStreamGet').remove();
    $('#player')[0].load();
    }, 100);
</script>

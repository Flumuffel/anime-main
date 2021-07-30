<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    //$test = file_get_contents($Ep['Link']);
    $test = file_get_contents("https://vupload.com/p74jwvo3nnho");

	$test = preg_replace('/<script.*src="((?!(http:|https:)..vupload).*)"><.script>/', 'lol', $test);
    $test = preg_replace('/..pictures.*js/', 'lol2', $test);

    echo $test;
?>
<script>
    $('.vjs-menu-content > li')[3].click();
    $('.vjs-menu-content > li')[2].click();
    $('.middle > button')[0].click();

    setTimeout(function() {
    var link = $('#vjsplayer_html5_api')[0].src; 
    $('<input id="link" type="hidden">').val(link).appendTo('body'); 
    
    $('.plyr__video-wrapper > #player > source')[0].setAttribute("src", link)
    $('#newTab')[0].setAttribute("onClick", "window.open('"+link+"', 'Anime Stream', 'width=1000, height=700'); return false;")

    $('#deleteStreamGet').remove();
    //$('.middle > button')[0].click();
    $('#player')[0].load();
    }, 100);
</script>

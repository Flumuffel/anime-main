<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    $test = file_get_contents($Ep['Link']);

	$test = preg_replace('/<script.*src="((?!(http:|https:)..vupload).*)"><.script>/', 'lol', $test);
    $test = preg_replace('/..pictures.*js/', 'lol2', $test);

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
    fetch(link)
      .then(response => response.blob())
      .then(blob => {
        setFetching(false);
        const blobURL = URL.createObjectURL(blob);
	const name = "Ep<?php echo $params[4]; ?>"
        const a = document.createElement("a");
        a.href = blobURL;
	alert(blobURL);
        a.style = "display: none";

        if (name && name.length) a.download = name;
        document.body.appendChild(a);
        a.click();
      })
      .catch(() => setError(true));
    $('#download')[0].setAttribute("href", link)
    
    $('#deleteStreamGet').remove();
    $('.middle > button')[0].click();
    $('#player')[0].load();
    }, 100);
</script>

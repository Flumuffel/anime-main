<?php
    include(__dir__.'/inc/search/search_code.php');

    require 'config.php';

    $KLang;
    $ILang;

    $lang = $conn->prepare("SELECT * FROM Lang ORDER BY LangId ASC");
    $lang->execute();
    $lang = $lang->fetchAll();

    $count = 1;
    foreach($lang as $ln) {
        $KLang[$count] = $ln['LangKey'];
        $count++;
    }
    if(isset($params[5])){
        $ILang = array_search($params[5], $KLang);
    }

    $stmt = $conn->prepare("SELECT * FROM Episoden WHERE AnilistId = :aid ORDER BY Episode ASC, Lang ASC");
    $stmt->bindParam(':aid', $params[2]);
    $stmt->execute();
    $episode = $stmt->fetchAll();

    

    $foundEp = false;
    $EpFirst = false;
    $NoEpMatch = true;
    $Ep = [];

    foreach ($episode as $ep) {
        
        if(!$EpFirst) {
            $EpFirst = $ep;
            $foundEp = true;
        }
        if(isset($params[5])) {
            if($params[4] == $ep['Episode'] && array_search($params[5], $KLang) == $ep['Lang']) {
                $NoEpMatch = false;
                $Ep = $ep;
                break;
            }
        }
    }
    if($NoEpMatch == true) {
        header("Location: /anime/".$params[2]."/episode/".$EpFirst['Episode']."/".$KLang[$EpFirst['Lang']]);
    }
?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <?php include("inc/meta.php"); ?>

    <title>AniMe</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/css/plyr.css" type="text/css">
    <link rel="stylesheet" href="/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/css/style.css" type="text/css">
</head>

<body>
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/anilist-querys.js"></script>
    <script src="/js/anilist.js"></script>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    
    <?php include("inc/header.php"); ?>

    <!-- Header End -->

    <!-- ID: HIDDEN -->
    <input id="anilistId" value="<?php echo $params[2]; ?>" type="hidden"></input>

    <!-- LANG: HIDDEN -->
    <input id="lang" value="<?php if(isset($params[5])) echo $params[5]; ?>" type="hidden"></input>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/anime">Anime</a>
                        <a href="/anime/<?php echo $params[2]; ?>"><?php echo $params[2]; ?></a>
                        <a href="">Episode</a>
                        <span><?php echo explode("?", $params[4])[0]; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad set-query" data-setquery="showEpisode">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="deleteStreamGet" style="display: none">
                        <?php include('inc/getStreamUrl.php'); ?>
                    </div>
                    <div id="RefreshEmbed">
                        <div class="anime__details__episodes" style="margin-bottom: 0; text-align: right;">
                            <a id="newTab" style="margin-right: 0; background: orange; color: white;">New Stream Tab</a>
                            <a style="margin-right: 0; background: blueviolet; color: white;" onclick="$('#player')[0].load();">Refresh Player</a>
                        </div>
                    </div>
                    <div class="anime__video__player" style="height: 491px">
                        <video id="player" playsinline controls controls preload="auto">
                            <source src="" scrlang="de" type="video/mp4" />
                            <!-- Captions are optional -->
                        </video>
                    </div>
                    <?php 
                        $lang = $conn->prepare("SELECT * FROM Lang ORDER BY LangId ASC");
                        $lang->execute();
                    
                        $lang = $lang->fetchAll();

                        foreach ($lang as $ln) {
                            $eps = $conn->prepare("SELECT * FROM Episoden WHERE AnilistId = :aid AND Lang = :lang  ORDER BY Episode ASC");
                            $eps->bindParam(':aid', $params[2]);
                            $eps->bindParam(':lang', $ln['LangId']);
                            $eps->execute();
                        
                            $episode = $eps->fetchAll();

                            if(isset($episode[0])){
                                echo '<div class="anime__details__episodes">';
                                echo '<div class="section-title">';
                                echo '<h5>'.$ln['LangKey'].'</h5>';
                                echo '</div>';

                                foreach ($episode as $ep) {
                                    $epN;
                                    if($ep['Episode'] >= 10) {
                                        $epN = $ep['Episode'];
                                    } else {
                                        $epN = '0'.$ep['Episode'];
                                    }
                                    echo '<a id="ep'.$ep['Episode'].''.$ln['LangKey'].'" href="/anime/'.$params[2].'/episode/'.$ep['Episode'].'/'.$ln['LangKey'].'">EP '.$epN.'</a>';

                                }

                                echo '</div>';
                            }
                        }
                    
                    ?>
                    <!--
                    <div class="anime__details__episodes">
                        <div class="section-title">
                            <h5>List Name</h5>
                        </div>
                        <a href="#">Ep 01</a>
                        <a href="#">Ep 02</a>
                        <a href="#">Ep 03</a>
                        <a href="#">Ep 04</a>
                        <a href="#">Ep 05</a>
                        <a href="#">Ep 06</a>
                        <a href="#">Ep 07</a>
                        <a href="#">Ep 08</a>
                        <a href="#">Ep 09</a>
                        <a href="#">Ep 10</a>
                        <a href="#">Ep 11</a>
                        <a href="#">Ep 12</a>
                        <a href="#">Ep 13</a>
                        <a href="#">Ep 14</a>
                        <a href="#">Ep 15</a>
                        <a href="#">Ep 16</a>
                        <a href="#">Ep 17</a>
                        <a href="#">Ep 18</a>
                        <a href="#">Ep 19</a>
                        <a href="#">Ep 20</a>
                        <a href="#">Ep 21</a>
                        <a href="#">Ep 22</a>
                        <a href="#">Ep 23</a>
                        <a href="#">Ep 24</a>
                    </div>
                    -->
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8" style="display: none;">
                    <div class="anime__details__review">
                        <div class="section-title">
                            <h5>Reviews</h5>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/img/anime/review-1.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/img/anime/review-2.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/img/anime/review-3.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/img/anime/review-4.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Chris Curry - <span>1 Hour ago</span></h6>
                                <p>whachikan Just noticed that someone categorized this as belonging to the genre
                                "demons" LOL</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/img/anime/review-5.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Lewis Mann - <span>5 Hour ago</span></h6>
                                <p>Finally it came out ages ago</p>
                            </div>
                        </div>
                        <div class="anime__review__item">
                            <div class="anime__review__item__pic">
                                <img src="/img/anime/review-6.jpg" alt="">
                            </div>
                            <div class="anime__review__item__text">
                                <h6>Louis Tyler - <span>20 Hour ago</span></h6>
                                <p>Where is the episode 15 ? Slow update! Tch</p>
                            </div>
                        </div>
                    </div>
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Your Comment</h5>
                        </div>
                        <form action="#">
                            <textarea placeholder="Your Comment"></textarea>
                            <button type="submit"><i class="fa fa-location-arrow"></i> Review</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

    <!-- Footer Section Begin -->
    
    <?php include("inc/footer.php"); ?>

    <!-- Footer Section End -->

    <!-- Search model Begin -->
        <?php include(__dir__.'/inc/search/search_html.php'); ?>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/player.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/main.js"></script>

</body>

</html>

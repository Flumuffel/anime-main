<?php
    include(__dir__.'/inc/search/search_code.php');

    require 'config.php';

    $stmt = $conn->prepare("SELECT * FROM Episoden WHERE AnilistId = :aid AND Episode = :ep ORDER BY Episode ASC, Lang ASC");
    $stmt->bindParam(':aid', $params[2]);
    $stmt->bindParam(':ep', $params[4]);
    $stmt->execute();

    $episode = $stmt->fetchAll();
    print_r($episode);
?>

<!DOCTYPE html>
<html lang="zxx">

<head>

    <?php include("inc/meta.php"); ?>

    <title>Anime | Template</title>

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

    <!-- Notification Section Begin -->

    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 0; left: 0; min-height: 200px; z-index: 999999">
        <!-- Position it -->
        <div style="position: absolute; top: 80px; left: 15px; width: 340px">
      
          <!-- Then put toasts within -->
          <?php
          if (!isset($_GET['noEpFound'])) {
            $_GET['noEpFound'] = "";
            goto EpFound;
          }
          ?>
          <div class="toast" style="background: rgb(210 215 14 / 21%); color: white; font-size: 15px;" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header" style="color: white; background: rgba(255,255,255,.08);">
              <strong class="mr-auto">Ani<span style="color: #C72C31">me</span></strong>
              <small class="text-muted" style="color: white !important"><strong>Fehler</strong></small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              Die Episode <strong><?php echo $_GET['noEpFound'] ?></strong> gibt es  <span style="color: gray;">(noch)</span>  nicht! <br>
            </div>
          </div>
          <script>
              window.history.pushState({}, document.title, "/anime/<?php echo $params[2]; ?>/episode/<?php echo explode("?", $params[4])[0]; ?>");
          </script>

          <?php EpFound: ?>

        </div>
      </div>

    <!-- Notification End -->

    <!-- ID: HIDDEN -->
    <input id="anilistId" value="<?php echo $params[2]; ?>" type="hidden"></input>

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
                    <div class="anime__video__player">
                        <video id="player" playsinline controls data-poster="https://img1.ak.crunchyroll.com/i/spire4-tmb/5d9f42e91df529bee28acde26121cd111428121589_full.jpg" controls>
                            <source src="//streamtape.com/get_video?id=xoYZXJy7WYIkbew&expires=1626358816&ip=DxEsEHOnDS9X&token=rsOktAGUdEoz&stream=1" scrlang="de" type="video/mp4" />
                            <!-- Captions are optional -->
                        </video>
                    </div>
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
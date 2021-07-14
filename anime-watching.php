<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="/">
                            <img src="/img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/">Homepage</a></li>
                                <li><a href="/categories.html">Categories <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="/categories.html">Categories</a></li>
                                        <li><a href="/anime-details.html">Anime Details</a></li>
                                        <li><a href="/anime-watching.html">Anime Watching</a></li>
                                        <li><a href="/blog-details.html">Blog Details</a></li>
                                        <li><a href="/signup.html">Sign Up</a></li>
                                        <li><a href="/login.html">Login</a></li>
                                    </ul>
                                </li>
                                <li><a href="/blog.html">Our Blog</a></li>
                                <li><a href="#">Contacts</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a class="search-switch"><span class="icon_search"></span></a>
                        <a href="/login.html"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Notification Section Begin -->

    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 0; left: 0; min-height: 200px; z-index: 999999">
        <!-- Position it -->
        <div style="position: absolute; top: 80px; left: 15px; width: 340px">
      
          <!-- Then put toasts within -->
          <?php
          if (!isset($_GET['noEpFound'])) {
            goto EpFound;
          }
          ?>
          <div class="toast" style="background: rgba(255,255,255,.1); color: white; font-size: 15px;" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header" style="color: white; background: rgba(255,255,255,.08);">
              <strong class="mr-auto">Ani<span style="color: #C72C31">me</span></strong>
              <small class="text-muted" style="color: white !important"><strong>Fehler</strong></small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              Die Episode <strong><?php echo $_GET['noEpFound'] ?></strong> gibt es <span style="color: gray;">(noch)</span> nicht! <br>
            </div>
          </div>

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
                <div class="col-lg-8">
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
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="/"><img src="/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="/">Homepage</a></li>
                            <li><a href="/categories.html">Categories</a></li>
                            <li><a href="/blog.html">Our Blog</a></li>
                            <li><a href="#">Contacts</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                      Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                      <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

                  </div>
              </div>
          </div>
      </footer>
      <!-- Footer Section End -->

      <!-- Search model Begin -->
      <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
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
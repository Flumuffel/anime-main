<?php
    include('inc/search/search_code.php');
    /*
    if(!isset($params[2]) || $params[2] == "") {
        header('Location: /');
    }
    */
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    
    <?php include("inc/meta.php"); ?>

    <title>Anime | Panel</title>

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

    <!-- Search HTML Begin -->

    <div class="d-flex align-items-center justify-content-center search-model-form" style="margin-top: 30px;">
        <input name="searchPanel" type="text" id="search-panel-input" placeholder="Search Database.....">
    </div>

    <script>
    var timer = null;
    $('#search-panel-input').keydown(function(){
        clearTimeout(timer); 
        timer = setTimeout(doStuff, 500)
    });

    function doStuff() {
        $('#search').val($('#search-panel-input')[0].value).trigger("change");
    }
    </script>
    <!-- Search HTML End-->

    <!-- Notification Section Begin -->

    <div aria-live="polite" aria-atomic="true" style="position: fixed; top: 0; left: 0; min-height: 200px; z-index: 999999">
        <!-- Position it -->
        <div style="position: absolute; top: 80px; left: 15px; width: 340px">
      
          <!-- Then put toasts within -->
          <?php 
          if (explode(".", $_SERVER['HTTP_HOST'])[0] == "anime") {
              goto noDev;
          }
          
          ?>

          <div class="toast" style="background: rgb(210 215 14 / 21%); color: white; font-size: 15px;" role="alert" aria-live="assertive" aria-atomic="true" data-autohide="false">
            <div class="toast-header" style="color: white; background: rgba(255,255,255,.08);">
              <strong class="mr-auto">Ani<span style="color: #C72C31">me</span></strong>
              <small class="text-muted" style="color: white !important"><strong>Achtung!</strong></small>
              <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="toast-body">
              <strong>Das ist die Dev umgebung!</strong>
            </div>
          </div>

          <?php noDev: ?>

        </div>
      </div>

    <!-- Notification End -->

    <!-- SEARCH INPUT Begin -->
    <input id="search" type="hidden" value="<?php echo str_replace("+", " ", $params[2]); ?>">
    <!-- SEARCH INPUT End -->

    <!-- Product Section Begin -->
    <section class="product spad" style="padding-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- Search -->

                    <div class="show__search set-query" data-setquery="showSearch">
                        <!-- \/ Title + View All \/ -->
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Search Anime</h4>
                                </div>
                            </div>
                        </div>
                        <!-- \/ CONTENT \/ -->
                        <div class="row">
                            <!--
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="img/popular/popular-1.jpg">
                                        <div class="ep">18 / 18</div>
                                        <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                        <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                    </div>
                                    <div class="product__item__text">
                                        <ul>
                                            <li>Active</li>
                                            <li>Movie</li>
                                        </ul>
                                        <h5><a href="#">Sen to Chihiro no Kamikakushi</a></h5>
                                    </div>
                                </div>
                            </div>
                        -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->

    <?php include("inc/footer.php"); ?>

    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <?php include('inc/search/search_html.php'); ?>
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
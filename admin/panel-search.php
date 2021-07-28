<?php
    include('inc/search/search_code.php');
    
    if($_SERVER['HTTP_HOST'] != "localhost" && !$_SERVER['HTTP_AUTHORIZATION']) header("Location: /login");
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

    <!-- SEARCH INPUT Begin -->
    <input id="search" type="hidden" value="">
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
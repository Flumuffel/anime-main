<?php
    include('inc/search/search_code.php');

    if ($params[2] == null) {
        header('Location: /panel');
    }

    require 'config.php';

    $stmt = $conn->prepare("SELECT * FROM Episoden WHERE AnilistId = :aid ORDER BY Lang ASC, Episode ASC");
    $stmt->bindParam(':aid', $params[2]);
    $stmt->execute();
    $episode = $stmt->fetchAll();

    $stmt = $conn->prepare("SELECT * FROM Lang ORDER BY LangId ASC");
    $stmt->execute();
    $lang = $stmt->fetchAll();

    

    $foundEp = false;
    $EpFirst = false;
    $NoEpMatch = true;
    $Ep = [];

    foreach ($episode as $ep) {
        
        if(!$EpFirst) {
            $EpFirst = $ep;
            $foundEp = true;
        }
    }
?>
<!DOCTYPE html>
<html lang="zxx">

<head>

    <?php include("inc/meta.php"); ?>

    <title>Anime</title>

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

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="/"><i class="fa fa-home"></i> Home</a>
                        <a href="/panel"> Panel</a>
                        <?php 
                            if(isset($_SERVER['HTTP_REFERER'])){
                                $url = explode("/", $_SERVER['HTTP_REFERER']);
                                if($url[3] == "search") {
                                    echo '<a href="/search/'.$url[4].'">Search</a>';
                                }
                            } else {
                                echo '<a>Anime</a>';
                            }
                        ?>
                        <span><?php echo $params[2] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Trailer Start -->
    <div id="trailerModal" class="modal fade bd-trailer-lg" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="background: #0b0c2a">
                <div class="modal-header" style="border-bottom: 0;">
                    <h5 class="modal-title" style="color: white; font-weight: 800; font-size: 25px">Trailer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#trailerStream').attr('src', $('#trailerStream').attr('src'));">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="trailerStream" class="col-sm-12" height="550px" src="https://www.youtube.com/embed/bXCCKubabe0" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen=""></iframe>
                    </div>
                    <div class="modal-footer" style="border-top: 0;">
                    <!-- <button id="share" class="btn btn-secondary">Teilen</button> -->
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#trailerStream').attr('src', $('#trailerStream').attr('src'));">Close</button>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                $('#trailerModal')[0].onclick = function () {
                    var targets = document.querySelectorAll( ":hover" );
                    if(targets[3] == undefined && targets[targets.length -1].tagName != "BUTTON") {
                        $('#trailerStream').attr('src', $('#trailerStream').attr('src'));
                    }
                }
            }, 500)
        </script>
    </div>
    <!-- Trailer End-->

    <?php 
        if(isset($params[3]) && $params[3] == "Trailer") {} else {
            goto noTrailerOpen;
        }
    ?>

    <script>
        window.history.pushState({}, document.title, "/anime/<?php echo $params[2]; ?>/");
        setTimeout(function() {
            $('#trailerModal').modal("show")
        }, 500)
    </script>

    <?php noTrailerOpen: ?>

    <!-- Anime Section Begin -->
    <section class="anime-details spad set-query" data-setquery="showDetails" style="padding-bottom: 10px;">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="https://s4.anilist.co/file/anilistcdn/media/anime/cover/large/bx15583-rTuRqDFTM1UZ.png">
                            <div class="comment"> TV</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>Fate Stay Night: Unlimited Blade</h3>
                                <span>フェイト／ステイナイト, Feito／sutei naito</span>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
                            <p>Every human inhabiting the world of Alcia is branded by a “Count” or a number written on
                                their body. For Hina’s mother, her total drops to 0 and she’s pulled into the Abyss,
                                never to be seen again. But her mother’s last words send Hina on a quest to find a
                            legendary hero from the Waste War - the fabled Ace!</p>
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 left">
                                        <ul>
                                            <li><span>Type:</span> TV Series</li>
                                            <li><span>Studios:</span> Lerche</li>
                                            <li><span>Date aired:</span> Oct 02, 2019 to ?</li>
                                            <li><span>Status:</span> Airing</li>
                                            <li><span>Genre:</span> Action, Adventure, Fantasy, Magic</li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-6 col-md-6 right">
                                        <ul>
                                            <li><span>Rating:</span> 7.31 / 1,515</li>
                                            <li><span>Episoden:</span> 12</li>
                                            <li><span>Duration:</span> 24 min/ep</li>
                                            <li><span>Views:</span> 131,541</li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Anime Section End -->

        <!-- Stream Link Start -->
        <section class="anime-details spad container">
            <div class="search-model-form" style="height: 50px; display: block; text-align: right;">
                <button class="btn btn-success" style="margin-right: 0;" onclick="test()">New</button>
            </div>
            <div class="d-flex align-items-center justify-content-center search-model-form">
                <table class="table" style="color: white;">
                    <thead>
                        <tr>
                        <th scope="col">Episode</th>
                        <th scope="col">Link</th>
                        <th scope="col">Lang</th>
                        <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if($foundEp == true) {
                                foreach ($episode as $ep) { 
                                    echo '<tr>';
                                    echo '<th scope="row"><input style="width: -webkit-fill-available; font-size: initial;" type="number" placeholder="Episode Nr." value="'.$ep['Episode'].'"></th>';
                                    echo '<td><input style="width: -webkit-fill-available; font-size: initial;" type="url" pattern="https://vupload.com/.*" placeholder="Link" value="'.$ep['Link'].'"></td>';
                                    echo '<td style="color: black;"><select id="lang">';
                                        foreach ($lang as $ln) {
                                            if($ln['LangId'] == $ep['Lang']) {
                                                echo '<option value="'.$ln['LangId'].'" selected>'.$ln['LangKey'].'</option>';
                                            } else {
                                                echo '<option value="'.$ln['LangId'].'">'.$ln['LangKey'].'</option>';
                                            }
                                        }
                                    echo '</select></td>';
                                    echo '<td class="align-items-center justify-content-center">
                                        <button class="btn btn-danger col-lg" onclick="$(this).parent().parent().remove()">Remove</button>
                                    </td>';
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr>';
                                echo '<th scope="row"><input style="width: -webkit-fill-available; font-size: initial;" type="number" placeholder="Episode Nr."></th>';
                                echo '<td><input style="width: -webkit-fill-available; font-size: initial;" type="url" pattern="https://vupload.com/.*" placeholder="Link"></td>';
                                echo '<td style="color: black;"><select id="lang">';
                                    foreach ($lang as $ln) {
                                        echo '<option value="'.$ln['LangId'].'">'.$ln['LangKey'].'</option>';
                                    }
                                echo '</select></td>';
                                echo '<td class="align-items-center justify-content-center">
                                    <button class="btn btn-danger col-lg" onclick="$(this).parent().parent().remove()">Remove</button>
                                </td>';
                                echo '</tr>';
                            }
                        ?>
                        <!--
                        <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        </tr>
                        -->
                    </tbody>
                </table>
            </div>
        </section>
        <script>
            function test() {
                var tr = document.createElement("tr");

                var th = document.createElement("th");
                th.scope = "row"
                th.innerHTML = '<input style="width: -webkit-fill-available; font-size: initial;" type="number" placeholder="Episode Nr.">';
                tr.appendChild(th)

                var t1 = document.createElement("td");
                t1.innerHTML = '<input style="width: -webkit-fill-available; font-size: initial;" type="url" pattern="https://vupload.com/.*" placeholder="Link">';
                tr.appendChild(t1)

                <?php 
                $langT = "";
                $count = 0; 
                foreach ($lang as $ln) { 
                    $count++; 
                    if($count == 1){ 
                        $langT = $langT . '<span class="current">'.$ln['LangKey'].'</span>'; 
                        $langT = $langT . '<ul class="list">'; 
                        $langT = $langT . '<li data-value="'.$ln['LangId'].'" class="option selected">'.$ln['LangKey'].'</li>'; 
                    } else { 
                        $langT = $langT . '<li data-value="'.$ln['LangId'].'" class="option">'.$ln['LangKey'].'</li>'; 
                    } 
                } 
                $langT = $langT . '</ul>'
                ?>

                var t2 = document.createElement("td");
                t2.style = "color: black;";
                t2.innerHTML = '<div class="nice-select" tabindex="0"><?php echo $langT; ?></div>';
                tr.appendChild(t2)

                var opt = document.createElement("td");
                opt.className = "align-items-center justify-content-center";
                opt.innerHTML = '<button class="btn btn-danger col-lg" onclick="$(this).parent().parent().remove()">Remove</button>';
                tr.appendChild(opt)

                $('tbody').append(tr)

                console.log(tr)
                /*
                echo '<tr>';
                echo '<th scope="row"><input style="width: -webkit-fill-available; font-size: initial;" type="number" placeholder="Episode Nr."></th>';
                echo '<td><input style="width: -webkit-fill-available; font-size: initial;" type="url" pattern="https://vupload.com/.*" placeholder="Link"></td>';
                echo '<td style="color: black;"><select id="lang">';
                    foreach ($lang as $ln) {
                        echo '<option value="'.$ln['LangId'].'">'.$ln['LangKey'].'</option>';
                    }
                echo '</select></td>';
                echo '<td class="align-items-center justify-content-center">
                    <button class="btn btn-danger col-lg" onclick="$(this).parent().parent().remove()">Remove</button>
                </td>';
                echo '</tr>';
                */
            }

            /*
            setTimeout(function() {
                $('input').on('change', function(input) {
                    console.log($(input.target).parent().parent().find('#dataId')[0].value)
                })
                $('.current').on('DOMSubtreeModified', function(input) { 
                    if($(input.target)[0].innerHTML != "") {
                        console.log("Changed Input: "+$(input.target)[0].innerHTML)
                    }
                })
            }, 500)
            */
        </script>
        <!-- Stream Link End -->

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
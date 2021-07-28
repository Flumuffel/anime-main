<header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li class="active"><a href="/">Homepage</a></li>
                                <!--
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
                                -->
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a class="search-switch"><span class="icon_search"></span></a>
                        <?php 
                            if(isset($params[1]) && $params[1] == "anime") {
                                if(isset($params[2])) {
                                    echo '<a href="/panel/'.$params[2].'"><span class="icon_profile"></span></a>';
                                }
                            } else if (isset($params[1]) && $params[1] == "panel") {
                                if(isset($params[2])) {
                                    echo '<a href="/anime/'.$params[2].'"><span class="icon_profile"></span></a>';
                                }
                            } else {
                                echo '<a href="/panel/"><span class="icon_profile"></span></a>';
                            }
                        ?>
                        <!-- <a href=""><span class="icon_profile"></span></a> -->
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
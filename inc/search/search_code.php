<?php

    if(isset($_POST['search'])){
        header("Location: /search/".str_replace(' ', '+', $_POST['search']));
    }